# 🚨 SASNO – Sistema de Alerta Sísmica No Oficial 

Laboratorio para aprender SQL Injection 💉 (nivel principiante).

Esta web es vulnerable a propósito.
Si explotas el login correctamente, entras como admin y puedes emitir una alerta sísmica falsa

---

## 🎯 Objetivo

- Encontrar la vulnerabilidad en el login
- Acceder sin credenciales válidas
- Obtener las 3 flags 🚩
- Identificar al usuario admin
- Ver el impacto que causan estas vulnerabilidades (el panel de alerta)

---

## 🛠️ Tecnologías

- PHP
- MySQL
- Docker

---

## 📂 Estructura

```text
sasno-lab/
├── docker-compose.yml
├── db/init.sql
└── web/
    ├── index.php
    ├── config.php
    └── assets/


⸻

##▶️ Cómo correrlo

docker-compose up -d

Abrir en el navegador:

http://localhost


⸻

##📦 Entrega
	•	Usuario y rol
	•	Las 3 flags
	•	Explicación corta de:
	•	qué falló
	•	por qué es peligroso

⸻

##⚠️ Nota
	•	Vulnerabilidad intencional
	•	Todo es falso / simulado
	•	No usar en producción ❌
