# Projeto de Estatísticas Geopolíticas

Este é um projeto que reúne dados econômicos e demográficos globais para análise e comparação de estatísticas geopolíticas. O sistema é dividido em duas partes: **backend (API - Laravel)** e **frontend (Vue.js)**.

## Estrutura do Projeto

```
- frontend/   # Aplicação Vue.js
- api/        # Backend Laravel
```

---

## 📌 Configuração do Backend (API - Laravel)

### 1️⃣ Instalar dependências
```sh
cd api
composer install
```

### 2️⃣ Configurar o ambiente
Copie o arquivo `.env.example` para `.env` e edite as configurações do banco de dados:
```sh
cp .env.example .env
```

### 3️⃣ Gerar a chave da aplicação
```sh
php artisan key:generate
```

### 4️⃣ Rodar as migrações e seeders
```sh
php artisan migrate --seed
```

### 5️⃣ Iniciar o servidor
```sh
php artisan serve
```
A API estará disponível em `http://127.0.0.1:8000`.

---

## 🌍 Configuração do Frontend (Vue.js)

### 1️⃣ Instalar dependências
```sh
cd frontend
npm install
```

### 2️⃣ Configurar a API no frontend
Edite `main.ts` e defina a URL da API:
```ts
app.provide('config', {
  apiUrl: 'http://127.0.0.1:8000'
});
```

### 3️⃣ Rodar a aplicação
```sh
npm run dev
```
A aplicação estará disponível em `http://localhost:5173` (porta padrão do Vite).

---

## 📡 Endpoints Principais da API

### 📊 Censo
| Método | Rota | Descrição |
|--------|------|-----------|
| `GET`  | `/api/census/names/{name}` | Busca estatísticas de nomes |
| `GET`  | `/api/census/ranking` | Retorna ranking de nomes |

### 🌎 Localizações
| Método | Rota | Descrição |
|--------|------|-----------|
| `GET`  | `/api/locations/districts/{id?}` | Retorna distritos pelo ID |
| `GET`  | `/api/locations/states/{state}/districts` | Retorna distritos por estado |
| `GET`  | `/api/locations/mesoregions/{mesoregion}/districts` | Retorna distritos por mesorregião |
| `GET`  | `/api/locations/microregions/{microregion}/districts` | Retorna distritos por microrregião |
| `GET`  | `/api/locations/municipalities/{municipality}/districts` | Retorna distritos por município |

### 📈 PIB (Produto Interno Bruto)
| Método | Rota | Descrição |
|--------|------|-----------|
| `GET`  | `/api/gdp/` | Lista dados de PIB |
| `GET`  | `/api/gdp/{country_code}/{year}` | Retorna PIB por país e ano |

### 💰 Distribuição de Renda
| Método | Rota | Descrição |
|--------|------|-----------|
| `GET`  | `/api/income/compare-income` | Compara renda entre países |

### 🏳️ Países
| Método | Rota | Descrição |
|--------|------|-----------|
| `GET`  | `/api/countries/` | Retorna lista de países |

---

## 🛠️ Tecnologias Utilizadas
- **Backend:** Laravel 11, MySQL
- **Frontend:** Vue.js 3, TypeScript
- **API de Dados:** IBGE, fontes globais de economia

---

## 🚀 Melhorias Futuras
- 🔍 Filtros avançados para busca de dados
- 📊 Visualizações gráficas de estatísticas
- 🌎 Tradução para múltiplos idiomas
- 📱 Versão mobile otimizada


---

## 📄 Licença
Este projeto é open-source e distribuído sob a licença MIT.

