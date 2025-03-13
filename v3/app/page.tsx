import React from "react";

/**
 * Portfolio component representing a personal portfolio page.
 * 
 * @returns {JSX.Element} The rendered portfolio page.
 * 
 * @component
 * @example
 * return (
 *   <Portfolio />
 * )
 * 
 * @description
 * The Portfolio component is a functional React component that renders a personal portfolio page.
 * It includes a header with navigation links, a main section with a brief introduction and links to social media profiles,
 * and a footer with personal information and copyright details.
 * 
 * @remarks
 * The component uses Tailwind CSS classes for styling and FontAwesome icons for social media links.
 * 
 * @see {@link https://github.com/dieguesmosken} GitHub Profile
 * @see {@link https://linkedin.com/in/dieguesmosken} LinkedIn Profile
 */
const Portfolio: React.FC = () => {
  return (
    <div className="flex flex-col min-h-screen">
      {/* Cabeçalho */}
      <header className="bg-gray-900 text-white p-4">
        <nav className="flex justify-between max-w-4xl mx-auto">
          <a className="text-lg font-bold" href="#">BADWOLF3D</a>
          <div className="space-x-4">
            <a className="hover:text-gray-400" href="/about">Sobre mim</a>
            <a className="hover:text-gray-400" href="/projects">Projetos</a>
          </div>
        </nav>
      </header>

      {/* Corpo */}
      <main className="flex flex-col md:flex-row items-center justify-center flex-1 p-6 max-w-5xl mx-auto">
        <section className="text-center md:text-left md:w-1/2">
          <h1 className="text-3xl md:text-5xl font-bold">
            Transforme suas ideias em realidade!
            <strong className="text-blue-500"> Com habilidade e inovação</strong>
          </h1>

          <div className="mt-6">
            <h2 className="text-xl font-semibold">Acesse minhas redes</h2>
            <div className="mt-2 flex justify-center md:justify-start space-x-4">
              <a className="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700" href="https://github.com/dieguesmosken">
                <i className="fab fa-github"></i> GitHub
              </a>
              <a className="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600" href="https://linkedin.com/in/dieguesmosken">
                <i className="fab fa-linkedin-in"></i> LinkedIn
              </a>
            </div>
          </div>
        </section>
        <img className="w-48 md:w-64 rounded-full mt-6 md:mt-0" src="assets/user1.png" alt="Foto de Matheus Mosken Diegues" />
      </main>

      {/* Rodapé */}
      <footer className="bg-gray-900 text-white text-center p-4">
        <p>Desenvolvido por @dieguesmosken.</p>
        <p>55730362 MATHEUS MOSKEN DIEGUES</p>
        <p>CNPJ: 55.730.362/0001-20</p>
        <p>Todos os direitos reservados &copy; 2025</p>
      </footer>
    </div>
  );
};

export default Portfolio;
