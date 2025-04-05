---
title: Introduction
weight: 1
---

# Introduction

The Intermediate RESTful API allows for communication with the PayHere RESTful API. This approach is especially advantageous for mobile app developers who want to avoid direct integration with PayHere, making the integration process smoother and more efficient.

## Endpoints

```http
# Retrieve payments
GET /payhere/api/payments/:id

# Charge a payment
POST /payhere/api/payments/charge

# Capture a payment
POST /payhere/api/payments/capture

# Refund a payment
POST /payhere/api/payments/refund

# List all subscriptions
GET /payhere/api/subscriptions

# Retrieve a subscription
GET /payhere/api/subscriptions/:id

# Retry a subscription
POST /payhere/api/subscriptions/:id/retry

# Cancel a subscription
DELETE /payhere/api/subscriptions/:id
```
