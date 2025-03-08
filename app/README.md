# Projeto Vue.js

Este é um projeto desenvolvido em Vue.js.

## Requisitos

- Node.js (versão recomendada: 16+)
- NPM (ou Yarn, opcional)

## Instalação

Instale as dependências:
   ```sh
   npm install
   ```

## Configuração da URL do Backend

No arquivo `src/main.ts`, adicione a seguinte configuração para definir a URL da API do backend:

```ts
app.provide('config', {
  apiUrl: 'http://127.0.0.1:8000/api'
});
```

Caso a API esteja hospedada em outro servidor, altere `apiUrl` para a URL correspondente.

## Executando o projeto

Para iniciar o servidor de desenvolvimento, execute:
```sh
npm run dev
```

O projeto estará disponível em `http://localhost:5173/` (ou outra porta definida pelo Vite).

## Compilando para produção

Para gerar a versão de produção, utilize:
```sh
npm run build
```

Os arquivos compilados estarão disponíveis na pasta `dist/`.

## Licença

Este projeto está sob a licença MIT.
