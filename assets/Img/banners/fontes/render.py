import asyncio, sys
from playwright.async_api import async_playwright
from PIL import Image
CSS='''
*{box-sizing:border-box;margin:0}
body{overflow:hidden;position:relative;background:#0e0820;font-family:"Poppins",sans-serif;color:#f1ebff}
.bg{position:absolute;inset:0;background:radial-gradient(ellipse at 78% 55%,#4b1fa8 0%,#2a1060 35%,#0e0820 78%)}
.streaks{position:absolute;inset:-50%;transform:rotate(-24deg);background:repeating-linear-gradient(90deg,transparent 0 140px,rgba(169,112,255,.10) 140px 143px,transparent 143px 260px,rgba(123,44,242,.12) 260px 262px)}
.paw{position:absolute;color:#7b2cf2;opacity:.16}
.teyo{position:absolute;filter:drop-shadow(0 0 28px rgba(123,44,242,.6))}
em{font-style:normal;color:#a970ff}
.pre{font-weight:600;color:#a970ff;letter-spacing:.5px}
h1{font-weight:800;line-height:1;letter-spacing:-1px;text-transform:uppercase;white-space:nowrap}
.tags{font-weight:600;color:#d4b8ff}
.url{display:inline-block;border:2px solid #7b2cf2;border-radius:12px;background:#150c2cdd;font-weight:600}
'''
PAW='<svg viewBox="0 0 100 100" width="{s}" height="{s}" fill="currentColor"><ellipse cx="50" cy="66" rx="24" ry="19"/><ellipse cx="20" cy="42" rx="9" ry="13"/><ellipse cx="40" cy="26" rx="9" ry="14"/><ellipse cx="62" cy="26" rx="9" ry="14"/><ellipse cx="82" cy="42" rx="9" ry="13"/></svg>'
def title(t):
    return t.replace('0','<em>0</em>')
def twitch():
    return f'''<html><head><meta charset=utf-8><style>{CSS}
body{{width:1200px;height:480px}}
.teyo{{right:-30px;bottom:-70px;height:540px}}
.top{{position:absolute;left:44px;top:82px;display:flex;align-items:baseline;gap:22px}}
h1{{font-size:54px}}
.tags{{font-size:20px}}
.bot{{position:absolute;left:44px;top:366px;display:flex;align-items:center;gap:18px}}
.pre{{font-size:19px}}
.url{{padding:5px 16px;font-size:18px}}
</style></head><body><div class=bg></div><div class=streaks></div>
<div class=paw style="left:20px;top:150px;transform:rotate(-18deg)">{PAW.format(s=150)}</div>
<div class=paw style="left:70px;top:290px;transform:rotate(12deg);opacity:.1">{PAW.format(s=90)}</div>
<img class=teyo src=teyo.png>
<div class=top><h1>{title("teuzin0dev")}</h1><div class=tags>dev &middot; streamer &middot; furry</div></div>
<div class=bot><div class=url>twitch.tv/teuzin0dev</div><div class=pre>fala, matilha!</div></div>
</body></html>'''
def site(pre,t,tags,flip=False):
    return f'''<html><head><meta charset=utf-8><style>{CSS}
body{{width:1200px;height:300px;border-radius:0}}
.teyo{{right:20px;bottom:-60px;height:350px}}
.txt{{position:absolute;left:56px;top:62px}}
.pre{{font-size:22px;margin-bottom:6px}}
h1{{font-size:64px}}
.tags{{margin-top:12px;font-size:22px}}
</style></head><body><div class=bg></div><div class=streaks></div>
<div class=paw style="left:620px;top:30px;transform:rotate(-18deg)">{PAW.format(s=130)}</div>
<img class=teyo src=teyo.png>
<div class=txt><div class=pre>{pre}</div><h1>{title(t)}</h1><div class=tags>{tags}</div></div>
</body></html>'''
async def main():
    jobs=[('twitch',twitch(),1200,480),
     ('home',site('fala, matilha!','teuzin0dev','dev &middot; streamer &middot; furry'),1200,300),
     ('sobre',site('quem &eacute; o teyo?','sobre mim','24 anos &middot; furry desde que me lembro'),1200,300),
     ('lives',site('bora pra live','lives','twitch.tv/teuzin0dev'),1200,300),
     ('programacao',site('c&oacute;digo, OBS e jogos','programa&ccedil;&atilde;o','o que eu uso e o que eu fa&ccedil;o'),1200,300)]
    async with async_playwright() as p:
        b=await p.chromium.launch()
        for n,h,w,ht in jobs:
            open(f'{n}.html','w').write(h)
            pg=await b.new_page(viewport={'width':w,'height':ht},device_scale_factor=2)
            await pg.goto(f'file:///tmp/claude-0/out/b2/{n}.html'); await pg.wait_for_timeout(400)
            await pg.screenshot(path=f'{n}@2x.png'); await pg.close()
        await b.close()
    for n,_,w,ht in jobs:
        im=Image.open(f'{n}@2x.png').convert('RGB')
        im.resize((w,ht),Image.LANCZOS).save(f'{n}.jpg',quality=92)
asyncio.run(main())
