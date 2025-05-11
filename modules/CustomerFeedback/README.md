# 🧠 Customer Feedback Analyzer Module

A modular Laravel package designed to collect, analyze, and manage customer feedback using modern architecture and technologies like Kafka, Redis, Elasticsearch, and AI-powered sentiment analysis.

---

## 📦 Features

- Submit feedback via REST API.
- Feedback stored asynchronously using **Kafka**.
- Analyze sentiment using **AI services** (e.g., OpenAI, HuggingFace).
- Indexed in **Elasticsearch** for fast querying.
- **Redis** used to cache analysis results for performance.
- Clean architecture using **Service Layer**, **Repository Pattern**, **DTO**, **Enum**, and **TDD**.
- Starts as a monolithic dirty implementation, then evolves into a well-structured, testable module.
- Designed for future VueJS client integration.

---

## 📁 Project Structure

```bash
modules/
└── CustomerFeedback/
    ├── Contracts/
    │   └── Repositories/
    ├── Database/
    │   ├── factories/
    │   └── Migrations/
    ├── DTOs/
    ├── Enums/
    ├── Http/
    │   ├── Controllers/
    │   └── Requests/
    ├── Models/
    ├── Repositories/
    ├── Services/
    ├── tests/
    │   ├── Feature/
    │   └── Unit/
    ├── CustomerFeedbackServiceProvider.php
    ├── routes.php
    └── docker-compose.yml
```

---

## 🧰 Why DTO and Enum?

### DTO (Data Transfer Object)

- Encapsulates input/output data for the API.
- Keeps controller/service logic clean and decoupled from Eloquent.
- Helps validate and structure data consistently.
- Makes unit testing services easier and more predictable.

### Enum

- Used to define allowed values for sentiment analysis.
- Example: `FeedbackStatus::Positive`, `::Negative`, `::Neutral`.
- Prevents magic strings and enforces type safety.
- Useful for validation and switch-based logic.

---

## 🧪 Tests

All tests follow the **TDD** approach and are categorized as:

- **Feature Tests**: End-to-end coverage of feedback APIs.
- **Unit Tests**: Testing individual components like services, DTOs, Kafka producers, and repositories.

---

## 🚀 Roadmap

1. [x] implementation for submitting feedback.
2. [x] Implement feedback analysis using AI.
3. [x] Store and index feedback in Elasticsearch.
4. [x] Implement Repository, DTO, and Enum.
5. [x] Refactor to services with full test coverage.
6. [ ] Add Redis caching for sentiment results.
7. [ ] Add authentication layer (optional).
8. [ ] Integrate VueJS dashboard (future).

---

## 🐳 Docker Support

`docker-compose.yml` is provided for easy setup of Kafka, Redis, and Elasticsearch.

---

## 🧠 AI-Powered Sentiment Analysis

AI integration helps in classifying feedback into sentiment categories using modern NLP models. Easily extendable using OpenAI or HuggingFace APIs.

---

## 📬 API

- `POST /feedback` – Submit a new feedback.
- `GET /feedbacks` – List all feedbacks (with filters).
- (Planned) `GET /feedbacks/stats` – Aggregated insights.

---

## 🧼 Refactor Plan

- Start with tightly coupled logic → gradually introduce abstraction:
  - Move logic into `Services`
  - Replace direct model calls with `Repositories`
  - Use `DTOs` for inputs/outputs
  - Use `Enums` for fixed logic
  - Wrap logic using `Facades` and `Factories`

---

## 🧩 Technology Stack

- Laravel 12
- Redis
- Kafka
- Elasticsearch
- PHP Unit (TDD)
- AI (via external APIs)
