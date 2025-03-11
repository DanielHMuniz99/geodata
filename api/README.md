# Dados de Distribuição de Renda

Este repositório contém dados sobre a distribuição de renda em diversos países, coletados do **World Development Indicators (WDI)**, uma base de dados mantida pelo Banco Mundial. Os dados são utilizados para análises de desigualdade de renda e comparações entre países.

---

## Fonte dos Dados

Os dados foram obtidos a partir do **World Development Indicators (WDI)**, disponível no site do Banco Mundial:

- **Link:** [World Development Indicators](https://databank.worldbank.org/reports.aspx?source=2&series=SI.POV.GINI&country=#)
- **Fonte:** Banco Mundial
- **Séries utilizadas:** Distribuição de renda por percentis.

---

## Período dos Dados

Os dados cobrem o período de **2020 a 2023**. Para alguns países ou séries, os dados podem estar incompletos ou indisponíveis para certos anos.

---

## Séries de Dados

As seguintes séries de dados foram utilizadas:

- **Income share held by highest 10%**  
  Participação da renda detida pelos 10% mais ricos.

- **Income share held by highest 20%**  
  Participação da renda detida pelos 20% mais ricos.

- **Income share held by lowest 10%**  
  Participação da renda detida pelos 10% mais pobres.

- **Income share held by lowest 20%**  
  Participação da renda detida pelos 20% mais pobres.

- **Income share held by second 20%**  
  Participação da renda detida pelo segundo quintil (20% a 40%).

- **Income share held by third 20%**  
  Participação da renda detida pelo terceiro quintil (40% a 60%).

- **Income share held by fourth 20%**  
  Participação da renda detida pelo quarto quintil (60% a 80%).

---

## Estrutura dos Dados

Os dados estão organizados em um arquivo CSV (`data.csv`), com a seguinte estrutura:

| Series Name                  | Series Code   | Country Name | Country Code | 2020 [YR2020] | 2021 [YR2021] | 2022 [YR2022] | 2023 [YR2023] |
|------------------------------|---------------|--------------|--------------|---------------|---------------|---------------|---------------|
| Income share held by highest 10% | SI.DST.10TH.10 | Afghanistan  | AFG          | ..            | ..            | ..            | ..            |
| Income share held by highest 10% | SI.DST.10TH.10 | Albania      | ALB          | 22.8          | ..            | ..            | ..            |

### Descrição das Colunas:

- **Series Name:** Nome da série de dados (ex.: "Income share held by highest 10%").
- **Series Code:** Código único da série no Banco Mundial (ex.: "SI.DST.10TH.10").
- **Country Name:** Nome do país.
- **Country Code:** Código do país (ISO Alpha-3, ex.: "AFG" para Afeganistão).
- **2020 [YR2020], 2021 [YR2021], 2022 [YR2022], 2023 [YR2023]:** Valores da série para cada ano. O símbolo `..` indica dados indisponíveis.

---

## Como Utilizar os Dados

Os dados podem ser utilizados para:

- Análises de desigualdade de renda.
- Comparações entre países.
- Estudos sobre distribuição de renda e pobreza.

### Exemplo de Uso:

1. **Leitura do CSV:**  
   Utilize ferramentas como Python (Pandas), R ou planilhas (Excel, Google Sheets) para ler e processar o arquivo CSV.

2. **Filtragem por País ou Ano:**  
   Filtre os dados por país ou ano para análises específicas.

3. **Visualização:**  
   Crie gráficos (ex.: gráficos de barras, boxplots) para visualizar a distribuição de renda.

---

## Limitações dos Dados

- **Dados Incompletos:**  
  Alguns países ou anos podem ter dados faltantes (indicados por `..`).

- **Atualização:**  
  Os dados são atualizados periodicamente pelo Banco Mundial. Verifique a fonte oficial para obter os dados mais recentes.

- **Metodologia:**  
  A metodologia de coleta e cálculo pode variar entre países. Consulte a documentação do Banco Mundial para detalhes.

---

## Referências

- Banco Mundial. (2023). **World Development Indicators**. Disponível em: [https://databank.worldbank.org/reports.aspx?source=2&series=SI.POV.GINI&country=#](https://databank.worldbank.org/reports.aspx?source=2&series=SI.POV.GINI&country=#).

---

## Licença

Os dados são disponibilizados pelo Banco Mundial sob a licença **Creative Commons Attribution 4.0 International (CC BY 4.0)**. Consulte a [página de termos de uso](https://datacatalog.worldbank.org/public-licenses) para mais detalhes.

---