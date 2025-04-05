---
title: Refund Payments
weight: 5
---

# Refund Payments

The PayHere [Refund API](https://support.payhere.lk/api-&-mobile-sdk/refund-api) allows you to refund payments.

## Endpoint

```http request
POST /payhere/api/payments/refund
```

**Required Parameters**

-   `payment_id`: The identifier of the payment to be refunded.
-   `description`: Additional details about the refund request.

## Request Body

_This request body is copied from the official PayHere knowledge base._

```json
{
    "payment_id": "320027150501",
    "description": "Item is out of stock",
    "authorization_token": "74d7f304-7f9d-481d-b47f-6c9cad32d3d5"
}
```

> [!IMPORTANT]
> To refund a payment, set the `payment_id` and remove the `authorization_token`. To refund a payment authorization, set the `authorization_token` and remove the `payment_id`.

## Response

_This response is copied from the official PayHere knowledge base._

If it is a payment refund,

```json
{
    "status": 1,
    "msg": "Successfully processed the refund",
    "data": 560034010257
}
```

If it is a payment authorization refund,

```json
{
    "status": 1,
    "msg": "Successfully processed the authorization refund",
    "data": null
}
```
