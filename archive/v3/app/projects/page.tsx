'use client'
import React, { useEffect, useState } from "react";

interface Repo {
  id: number;
  name: string;
  html_url: string;
}

export default function Projects() {
  const [repos, setRepos] = useState<Repo[]>([]);

  useEffect(() => {
    fetch("https://api.github.com/users/dieguesmosken/repos?sort=pushed")
      .then((response) => response.json())
      .then((data) => setRepos(data))
      .catch((error) => console.error("Erro ao carregar os projetos do GitHub:", error));
  }, []);

  return (
    <div className="flex flex-col items-center justify-center min-h-screen p-6">
      <h1 className="text-3xl font-bold">Projetos</h1>
      <h2 className="text-xl font-semibold mt-6">Repositórios Públicos</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        {repos.map((repo) => (
          <a key={repo.id} className="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700" href={repo.html_url} target="_blank" rel="noopener noreferrer">
            {repo.name}
          </a>
        ))}
      </div>
    </div>
  );
}
