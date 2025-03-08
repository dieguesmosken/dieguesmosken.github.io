import React from "react";

export default function About() {
  return (
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
  );
}
