import React from "react";

export default function About() {
  return (
    <>
      <div className="flex flex-col items-center justify-center min-h-screen p-6">
        <h1 className="text-3xl font-bold">Sobre mim</h1>
        <p className="mt-4 text-lg text-gray-700">
          Desenvolvedor Front-end com especialidade em HTML e CSS. Ajudo pequenos negócios e designers a colocarem em prática boas ideias.
        </p>
        <p className="mt-4 text-lg text-gray-700">
          Sou Matheus Mosken Diegues, formado em Desenvolvimento de Sistemas e atualmente graduando em Desenvolvimento de Software Multiplataforma.
        </p>
        <a className="text-blue-500 text-lg mt-4" href="mailto:contato@badwolf3d.com.br">contato@badwolf3d.com.br</a>
      </div>
      <div className="mt-4 text-lg text-gray-700">
        <p className="text-xl font-semibold">Acesse minhas redes</p>
        <div className="mt-2 flex justify-center md:justify-start space-x-4">
          <a className="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700" href="https://www.github.com/dieguesmosken">
            <i className="fab fa-github"></i> GitHub
          </a>
          <a className="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600" href="https://www.linkedin.com/in/dieguesmosken">
            <i className="fab fa-linkedin-in"></i> LinkedIn
          </a>
          <a className="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600" href="https://www.twitter.com/dieguesmosken">
            <i className="fab fa-twitter"></i> Twitter
          </a>
          <a className="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600" href="https://www.instagram.com/badwolfstl">
            <i className="fab fa-instagram"></i> Instagram
          </a>
        </div>
      </div>
    </>
  );
}
