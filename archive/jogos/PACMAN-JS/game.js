// Pac-Man do arquivo do teuzin0dev: labirinto, fantasmas com IA, pastilhas de poder,
// vidas, fases e recorde salvo no navegador.
(() => {
  const canvas = document.getElementById('canvas');
  const ctx = canvas.getContext('2d');

  const T = 30;            // tamanho do bloco
  const OY = 56;           // espaço do placar no topo
  const LAYOUT = [
    '###################',
    '#........#........#',
    '#o##.###.#.###.##o#',
    '#.................#',
    '#.##.#.#####.#.##.#',
    '#....#...#...#....#',
    '####.### # ###.####',
    '   #.#       #.#   ',
    '####.# ##-## #.####',
    '    .  #GGG#  .    ',
    '####.# ##### #.####',
    '   #.#       #.#   ',
    '####.# ##### #.####',
    '#........#........#',
    '#.##.###.#.###.##.#',
    '#o.#.....P.....#.o#',
    '##.#.#.#####.#.#.##',
    '#....#...#...#....#',
    '#.######.#.######.#',
    '#.................#',
    '###################',
  ];
  const W = LAYOUT[0].length, H = LAYOUT.length;
  const DIRS = [[0, -1], [-1, 0], [0, 1], [1, 0]]; // cima, esquerda, baixo, direita
  const DOOR = { c: 9, r: 8 }, EXIT = { c: 9, r: 7 }, HOUSE = { c: 9, r: 9 };
  const COLORS = { wall: '#7b2cf2', wallFill: '#1c1038', dot: '#d4b8ff', pac: '#ffc93c' };

  let grid, dotsLeft, score, lives, level, best, state, stateTimer, modeClock, frightTimer, ghostCombo, pac, ghosts, popups;
  try { best = +localStorage.getItem('pacman-teuzin-best') || 0; } catch (e) { best = 0; }

  const wrap = c => (c + W) % W;
  const isWall = (c, r) => r < 0 || r >= H || grid[r][wrap(c)] === '#';
  const isDoor = (c, r) => r >= 0 && r < H && grid[r][wrap(c)] === '-';

  function resetMap() {
    grid = LAYOUT.map(l => l.split(''));
    dotsLeft = 0;
    grid.forEach(row => row.forEach(ch => { if (ch === '.' || ch === 'o') dotsLeft++; }));
  }

  // ---------- entidades ----------
  class Mover {
    constructor(c, r, speed) { this.start = { c, r }; this.speed = speed; this.reset(); }
    reset() {
      this.c = this.start.c; this.r = this.start.r;
      this.nc = this.c; this.nr = this.r; this.t = 0; this.dir = [0, 0];
    }
    pos() {
      const dc = this.nc - this.c, dr = this.nr - this.r;
      // atravessa o túnel sem "teletransportar" a meio caminho
      const sc = Math.abs(dc) > 1 ? -Math.sign(dc) : dc;
      return { x: (this.c + sc * this.t + W) % W, y: this.r + dr * this.t };
    }
    reverse() {
      if (this.t === 0 && this.nc === this.c && this.nr === this.r) return;
      [this.c, this.nc] = [this.nc, this.c]; [this.r, this.nr] = [this.nr, this.r];
      this.t = 1 - this.t; this.dir = [-this.dir[0], -this.dir[1]];
    }
    step(dt, choose) {
      let d = this.speed * dt;
      if (this.nc === this.c && this.nr === this.r) { choose(this); if (this.nc === this.c && this.nr === this.r) return; }
      while (d > 0) {
        const need = 1 - this.t;
        if (d < need) { this.t += d; break; }
        d -= need; this.t = 0; this.c = this.nc; this.r = this.nr; this.arrive && this.arrive();
        choose(this);
        if (this.nc === this.c && this.nr === this.r) break;
      }
    }
  }

  class Pac extends Mover {
    constructor(c, r) { super(c, r, 7.2); this.want = [-1, 0]; this.mouth = 0; this.dying = 0; }
    canGo(c, r) { return !isWall(c, r) && !isDoor(c, r); }
    arrive() {
      const ch = grid[this.r][this.c];
      if (ch === '.' || ch === 'o') {
        grid[this.r][this.c] = ' ';
        dotsLeft--;
        score += ch === 'o' ? 50 : 10;
        if (ch === 'o') startFright();
        if (score > best) best = score;
      }
    }
  }
  const choosePac = p => {
    const tryDir = d => p.canGo(p.c + d[0], p.r + d[1]);
    let d = null;
    if (p.want && tryDir(p.want)) d = p.want;
    else if (p.dir[0] || p.dir[1]) { if (tryDir(p.dir)) d = p.dir; }
    if (d) { p.dir = d; p.nc = wrap(p.c + d[0]); p.nr = p.r + d[1]; }
    else { p.nc = p.c; p.nr = p.r; }
  };

  const GHOSTS = [
    { nome: 'Blinky', cor: '#ff4d6d', c: 9, r: 7, solta: 0, canto: { c: 17, r: 0 } },
    { nome: 'Pinky', cor: '#ff9ad5', c: 8, r: 9, solta: 2, canto: { c: 1, r: 0 } },
    { nome: 'Inky', cor: '#4cd6ff', c: 9, r: 9, solta: 6, canto: { c: 17, r: 20 } },
    { nome: 'Clyde', cor: '#ffa63c', c: 10, r: 9, solta: 10, canto: { c: 1, r: 20 } },
  ];

  class Ghost extends Mover {
    constructor(def, i) { super(def.c, def.r, 6.2); this.def = def; this.i = i; this.reset2(); }
    reset2() { this.reset(); this.mode = this.def.solta === 0 ? 'normal' : 'house'; this.fright = false; this.wait = this.def.solta; this.dir = [-1, 0]; }
    canGo(c, r) {
      if (isWall(c, r)) return false;
      if (isDoor(c, r)) return this.mode === 'leaving' || this.mode === 'eyes';
      return true;
    }
    arrive() {
      if (this.mode === 'leaving' && this.c === EXIT.c && this.r === EXIT.r) this.mode = 'normal';
      if (this.mode === 'eyes' && this.c === HOUSE.c && this.r === HOUSE.r) { this.mode = 'leaving'; this.fright = false; }
    }
  }

  // distância por caminho (BFS) até um alvo, usada por fantasmas saindo/voltando para casa
  function bfs(target, ghost) {
    const dist = new Map(), key = (c, r) => r * 100 + c;
    const q = [[target.c, target.r]]; dist.set(key(target.c, target.r), 0);
    while (q.length) {
      const [c, r] = q.shift(), dd = dist.get(key(c, r));
      for (const [dx, dy] of DIRS) {
        const nc = wrap(c + dx), nr = r + dy;
        if (nr < 0 || nr >= H || dist.has(key(nc, nr)) || !ghost.canGo(nc, nr)) continue;
        dist.set(key(nc, nr), dd + 1); q.push([nc, nr]);
      }
    }
    return (c, r) => dist.has(key(c, r)) ? dist.get(key(c, r)) : 1e9;
  }

  function ghostTarget(g) {
    const p = pac, d = p.dir;
    const pt = { c: p.c, r: p.r };
    switch (g.i) {
      case 0: return pt;
      case 1: return { c: pt.c + d[0] * 4, r: pt.r + d[1] * 4 };
      case 2: {
        const b = ghosts[0], ax = pt.c + d[0] * 2, ay = pt.r + d[1] * 2;
        return { c: ax + (ax - b.c), r: ay + (ay - b.r) };
      }
      default: return Math.hypot(g.c - pt.c, g.r - pt.r) > 8 ? pt : g.def.canto;
    }
  }

  function chooseGhost(g) {
    if (g.mode === 'house') { g.nc = g.c; g.nr = g.r; return; }
    const back = [-g.dir[0], -g.dir[1]];
    let opts = DIRS.filter(d => g.canGo(wrap(g.c + d[0]), g.r + d[1]));
    const forward = opts.filter(d => !(d[0] === back[0] && d[1] === back[1]));
    if (forward.length) opts = forward;
    if (!opts.length) { g.nc = g.c; g.nr = g.r; return; }

    let pick;
    if (g.mode === 'leaving' || g.mode === 'eyes') {
      const goal = g.mode === 'eyes' ? HOUSE : EXIT;
      const f = bfs(goal, g);
      pick = opts.reduce((a, b) => f(wrap(g.c + b[0]), g.r + b[1]) < f(wrap(g.c + a[0]), g.r + a[1]) ? b : a);
    } else if (g.fright) {
      pick = opts[Math.floor(Math.random() * opts.length)];
    } else {
      const tgt = scatter ? g.def.canto : ghostTarget(g);
      let bestD = Infinity;
      for (const d of opts) {
        const dd = (wrap(g.c + d[0]) - tgt.c) ** 2 + (g.r + d[1] - tgt.r) ** 2;
        if (dd < bestD) { bestD = dd; pick = d; }
      }
    }
    g.dir = pick; g.nc = wrap(g.c + pick[0]); g.nr = g.r + pick[1];
  }

  // ---------- modos ----------
  let scatter = true;
  const CICLO = [7, 20, 7, 20, 5, 20, 5, Infinity];
  let cicloIdx = 0;
  function startFright() {
    frightTimer = Math.max(3, 7 - (level - 1) * 0.6);
    ghostCombo = 0;
    ghosts.forEach(g => { if (g.mode === 'normal') { g.fright = true; g.reverse(); } });
  }
  function speedOf(g) {
    if (g.mode === 'eyes') return 13;
    if (g.mode === 'leaving' || g.mode === 'house') return 4.5;
    if (g.fright) return 3.8;
    return Math.min(6.2 + (level - 1) * 0.35, 8.2);
  }

  // ---------- fluxo do jogo ----------
  function newGame() { score = 0; lives = 3; level = 1; resetMap(); resetRound(true); }
  function resetRound(first) {
    pac = new Pac(9, 15);
    ghosts = GHOSTS.map((d, i) => new Ghost(d, i));
    frightTimer = 0; ghostCombo = 0; scatter = true; cicloIdx = 0; modeClock = CICLO[0]; popups = [];
    state = 'ready'; stateTimer = 2;
  }
  function nextLevel() { level++; resetMap(); resetRound(); state = 'ready'; stateTimer = 2; }
  function loseLife() {
    state = 'dying'; stateTimer = 1.4;
  }
  function addPopup(x, y, text) { popups.push({ x, y, text, t: 1 }); }

  function update(dt) {
    if (state === 'ready') { stateTimer -= dt; if (stateTimer <= 0) state = 'play'; return; }
    if (state === 'dying') {
      stateTimer -= dt;
      if (stateTimer <= 0) {
        lives--;
        if (lives <= 0) { state = 'over'; saveBest(); }
        else { const keep = grid; resetRound(); grid = keep; state = 'ready'; stateTimer = 1.5; }
      }
      return;
    }
    if (state !== 'play') return;

    // alternância entre dispersar e perseguir
    if (frightTimer <= 0) {
      modeClock -= dt;
      if (modeClock <= 0 && cicloIdx < CICLO.length - 1) {
        cicloIdx++; modeClock = CICLO[cicloIdx]; scatter = cicloIdx % 2 === 0;
        ghosts.forEach(g => { if (g.mode === 'normal') g.reverse(); });
      }
    } else {
      frightTimer -= dt;
      if (frightTimer <= 0) ghosts.forEach(g => { g.fright = false; });
    }

    if ((pac.dir[0] || pac.dir[1]) && pac.want[0] === -pac.dir[0] && pac.want[1] === -pac.dir[1]) pac.reverse();
    pac.step(dt, choosePac);
    pac.mouth += dt * 12;

    ghosts.forEach(g => {
      if (g.mode === 'house') {
        g.wait -= dt;
        if (g.wait <= 0) { g.mode = 'leaving'; g.dir = [0, 0]; }
      }
      g.speed = speedOf(g);
      g.step(dt, chooseGhost);
    });

    // colisões
    const pp = pac.pos();
    for (const g of ghosts) {
      const gp = g.pos();
      if (Math.hypot(pp.x - gp.x, pp.y - gp.y) < 0.55) {
        if (g.mode === 'eyes') continue;
        if (g.fright) {
          g.mode = 'eyes'; g.fright = false; ghostCombo++;
          const pts = 200 * 2 ** (ghostCombo - 1); score += pts; if (score > best) best = score;
          addPopup(gp.x, gp.y, pts);
        } else if (g.mode !== 'house') { loseLife(); break; }
      }
    }

    popups.forEach(p => p.t -= dt); popups = popups.filter(p => p.t > 0);
    if (dotsLeft <= 0) { state = 'win'; stateTimer = 2; }
  }
  function saveBest() { try { localStorage.setItem('pacman-teuzin-best', best); } catch (e) {} }

  // ---------- desenho ----------
  function drawWalls() {
    ctx.fillStyle = COLORS.wallFill;
    for (let r = 0; r < H; r++) for (let c = 0; c < W; c++) if (grid[r][c] === '#') ctx.fillRect(c * T, OY + r * T, T, T);
    ctx.lineWidth = 3; ctx.lineCap = 'round'; ctx.strokeStyle = COLORS.wall;
    ctx.shadowColor = COLORS.wall; ctx.shadowBlur = 8;
    ctx.beginPath();
    for (let r = 0; r < H; r++) for (let c = 0; c < W; c++) {
      if (grid[r][c] !== '#') continue;
      const x = c * T, y = OY + r * T;
      const open = (dc, dr) => { const nc = c + dc, nr = r + dr; return nc < 0 || nc >= W || nr < 0 || nr >= H ? false : grid[nr][nc] !== '#'; };
      if (open(0, -1)) { ctx.moveTo(x + 2, y + 2); ctx.lineTo(x + T - 2, y + 2); }
      if (open(0, 1)) { ctx.moveTo(x + 2, y + T - 2); ctx.lineTo(x + T - 2, y + T - 2); }
      if (open(-1, 0)) { ctx.moveTo(x + 2, y + 2); ctx.lineTo(x + 2, y + T - 2); }
      if (open(1, 0)) { ctx.moveTo(x + T - 2, y + 2); ctx.lineTo(x + T - 2, y + T - 2); }
    }
    ctx.stroke();
    ctx.shadowBlur = 0;
    // porta da casa dos fantasmas
    ctx.fillStyle = '#ff9ad5'; ctx.fillRect(DOOR.c * T + 2, OY + DOOR.r * T + T / 2 - 2, T - 4, 4);
  }
  function drawDots(now) {
    for (let r = 0; r < H; r++) for (let c = 0; c < W; c++) {
      const ch = grid[r][c], cx = c * T + T / 2, cy = OY + r * T + T / 2;
      if (ch === '.') { ctx.fillStyle = COLORS.dot; ctx.beginPath(); ctx.arc(cx, cy, 2.6, 0, 7); ctx.fill(); }
      else if (ch === 'o') {
        const pulse = 6 + Math.sin(now / 160) * 1.6;
        ctx.fillStyle = '#fff'; ctx.shadowColor = '#a970ff'; ctx.shadowBlur = 12;
        ctx.beginPath(); ctx.arc(cx, cy, pulse, 0, 7); ctx.fill(); ctx.shadowBlur = 0;
      }
    }
  }
  function drawPac() {
    const p = pac.pos(), cx = p.x * T + T / 2, cy = OY + p.y * T + T / 2, R = T / 2 - 2;
    const ang = Math.atan2(pac.dir[1], pac.dir[0] || (pac.dir[1] ? 0 : -1));
    let open = (Math.sin(pac.mouth) + 1) / 2 * 0.75 + 0.05;
    let a0 = open, a1 = Math.PI * 2 - open, rot = ang;
    if (state === 'dying') { const k = 1 - Math.max(0, stateTimer) / 1.4; a0 = k * Math.PI; a1 = Math.PI * 2 - k * Math.PI; rot = -Math.PI / 2; }
    ctx.fillStyle = COLORS.pac; ctx.beginPath();
    ctx.moveTo(cx, cy); ctx.arc(cx, cy, R, rot + a0, rot + a1); ctx.closePath(); ctx.fill();
  }
  function drawGhost(g, now) {
    const p = g.pos(), cx = p.x * T + T / 2, cy = OY + p.y * T + T / 2, R = T / 2 - 2;
    if (g.mode !== 'eyes') {
      let col = g.def.cor;
      if (g.fright) col = frightTimer < 2 && Math.floor(now / 200) % 2 ? '#ffffff' : '#3b3bff';
      ctx.fillStyle = col; ctx.beginPath();
      ctx.arc(cx, cy - 1, R, Math.PI, 0);
      ctx.lineTo(cx + R, cy + R);
      const waves = 3, w = (R * 2) / waves, off = Math.floor(now / 120) % 2 ? 2 : -2;
      for (let i = 0; i < waves; i++) ctx.quadraticCurveTo(cx + R - w * i - w / 2, cy + R + off, cx + R - w * (i + 1), cy + R);
      ctx.closePath(); ctx.fill();
    }
    // olhos
    const look = g.fright ? [0, 0] : g.dir;
    for (const s of [-1, 1]) {
      ctx.fillStyle = g.fright && g.mode !== 'eyes' ? '#ffd1d1' : '#fff';
      ctx.beginPath(); ctx.arc(cx + s * 5, cy - 3, 4, 0, 7); ctx.fill();
      if (!(g.fright && g.mode !== 'eyes')) { ctx.fillStyle = '#1c1038'; ctx.beginPath(); ctx.arc(cx + s * 5 + look[0] * 1.8, cy - 3 + look[1] * 1.8, 2, 0, 7); ctx.fill(); }
    }
  }
  function text(str, x, y, size, color, align = 'left') {
    ctx.font = `700 ${size}px "Segoe UI", system-ui, sans-serif`;
    ctx.fillStyle = color; ctx.textAlign = align; ctx.fillText(str, x, y);
  }
  function drawHud() {
    text('PONTOS', 14, 20, 12, '#b9a8e0'); text(String(score), 14, 44, 24, '#f1ebff');
    text('RECORDE', canvas.width / 2, 20, 12, '#b9a8e0', 'center'); text(String(best), canvas.width / 2, 44, 24, '#f1ebff', 'center');
    text('FASE ' + level, canvas.width - 14, 20, 12, '#b9a8e0', 'right');
    for (let i = 0; i < lives - (state === 'dying' ? 1 : 0); i++) {
      const x = canvas.width - 24 - i * 24, y = 38;
      ctx.fillStyle = COLORS.pac; ctx.beginPath(); ctx.moveTo(x, y); ctx.arc(x, y, 9, 0.7, Math.PI * 2 - 0.7); ctx.closePath(); ctx.fill();
    }
  }
  function overlay(title, sub) {
    ctx.fillStyle = 'rgba(14,8,32,.78)'; ctx.fillRect(0, OY + T * 6, canvas.width, T * 6);
    ctx.strokeStyle = COLORS.wall; ctx.lineWidth = 2; ctx.strokeRect(10, OY + T * 6 + 6, canvas.width - 20, T * 6 - 12);
    text(title, canvas.width / 2, OY + T * 8.6, 34, '#f1ebff', 'center');
    text(sub, canvas.width / 2, OY + T * 10, 15, '#b9a8e0', 'center');
  }
  function draw(now) {
    ctx.fillStyle = '#0e0820'; ctx.fillRect(0, 0, canvas.width, canvas.height);
    if (!grid) return;
    drawWalls(); drawDots(now);
    if (state !== 'dying') ghosts.forEach(g => drawGhost(g, now));
    drawPac();
    popups.forEach(p => text(String(p.text), p.x * T + T / 2, OY + p.y * T + T / 2 - (1 - p.t) * 16, 14, '#6ff7ff', 'center'));
    drawHud();
    if (state === 'start') overlay('PAC-MAN', 'toque ou aperte Enter para jogar');
    else if (state === 'ready') text('PRONTO!', canvas.width / 2, OY + T * 9.2, 22, COLORS.pac, 'center');
    else if (state === 'paused') overlay('PAUSADO', 'P ou espaço para continuar');
    else if (state === 'over') overlay('FIM DE JOGO', 'Enter ou toque para jogar de novo');
    else if (state === 'win') text('FASE COMPLETA!', canvas.width / 2, OY + T * 9.2, 24, '#6ff7ff', 'center');
  }

  // ---------- entrada ----------
  const KEYS = { ArrowUp: 0, w: 0, W: 0, ArrowLeft: 1, a: 1, A: 1, ArrowDown: 2, s: 2, S: 2, ArrowRight: 3, d: 3, D: 3 };
  function begin() { if (state === 'start' || state === 'over') newGame(); }
  window.addEventListener('keydown', e => {
    if (e.key in KEYS) { e.preventDefault(); begin(); if (pac) pac.want = DIRS[KEYS[e.key]]; }
    else if (e.key === 'Enter') begin();
    else if (e.key === 'p' || e.key === 'P' || e.key === ' ') {
      e.preventDefault();
      if (state === 'play') state = 'paused'; else if (state === 'paused') state = 'play'; else begin();
    }
  });
  let tx, ty;
  canvas.addEventListener('touchstart', e => { tx = e.touches[0].clientX; ty = e.touches[0].clientY; begin(); }, { passive: true });
  canvas.addEventListener('touchmove', e => {
    if (tx == null || !pac) return;
    const dx = e.touches[0].clientX - tx, dy = e.touches[0].clientY - ty;
    if (Math.max(Math.abs(dx), Math.abs(dy)) < 24) return;
    pac.want = Math.abs(dx) > Math.abs(dy) ? (dx > 0 ? DIRS[3] : DIRS[1]) : (dy > 0 ? DIRS[2] : DIRS[0]);
    tx = e.touches[0].clientX; ty = e.touches[0].clientY;
  }, { passive: true });
  canvas.addEventListener('click', begin);
  document.addEventListener('visibilitychange', () => { if (document.hidden && state === 'play') state = 'paused'; });

  // ---------- laço ----------
  resetMap(); resetRound(); state = 'start';
  let last = performance.now();
  function frame(now) {
    const dt = Math.min(0.05, (now - last) / 1000); last = now;
    if (state === 'win') { stateTimer -= dt; if (stateTimer <= 0) nextLevel(); }
    else update(dt);
    if (state === 'over' || state === 'win') saveBest();
    draw(now);
    requestAnimationFrame(frame);
  }
  requestAnimationFrame(frame);
  window.__pacman = { get state() { return state; }, get score() { return score; }, get lives() { return lives; }, get dotsLeft() { return dotsLeft; }, step: dt => update(dt), start: begin, get ghosts() { return ghosts; }, get pac() { return pac; } };
})();
