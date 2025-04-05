---
title: Subscription Payments
weight: 6
---

# Subscription Payments

The PayHere [Subscription Manager API](https://support.payhere.lk/api-&-mobile-sdk/subscription-manager-api) allows you to retrieve the payments of a subscription.

## Endpoint

```http
GET /payhere/api/subscriptions/:id/payments
```

**Required Parameter**

-   `id`: The `payhere_subscription_id` for the subscription.

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Found 2 payments",
    "data": [
        {
            "payment_id": 320025023469,
            "order_id": "Order0003",
            "date": "2018-10-04 20:24:52",
            "description": "Book reading Subscription",
            "status": "RECEIVED",
            "currency": "LKR",
            "amount": 200,
            "customer": {
                "fist_name": "Saman",
                "last_name": "Kumara",
                "email": "saman@gmail.com",
                "phone": "+94712345678",
                "delivery_details": {
                    "address": "1, Galle Road",
                    "city": "Colombo",
                    "country": ""
                }
            },
            "amount_detail": {
                "currency": "LKR",
                "gross": 200,
                "fee": 36.6,
                "net": 163.4,
                "exchange_rate": 1,
                "exchange_from": "LKR",
                "exchange_to": "LKR"
            },
            "payment_method": {
                "method": "VISA",
                "card_customer_name": "Saman Kumara",
                "card_no": "************4564"
            },
            "items": [
                {
                    "name": "Book reading Subscription",
                    "quantity": 1,
                    "currency": "LKR",
                    "unit_price": 100,
                    "total_price": 100
                },
                {
                    "name": "Startup Fee",
                    "quantity": 1,
                    "currency": "LKR",
                    "unit_price": 100,
                    "total_price": 100
                }
            ]
        },
        {
            "payment_id": 320025023470,
            "order_id": "Order0003",
            "date": "2018-10-04 20:25:52",
            "description": "Book reading Subscription",
            "status": "RECEIVED",
            "currency": "LKR",
            "amount": 100,
            "customer": {
                "fist_name": "Saman",
                "last_name": "Kumara",
                "email": "saman@gmail.com",
                "phone": "+94712345678",
                "delivery_details": {
                    "address": "1, Galle Road",
                    "city": "Colombo",
                    "country": ""
                }
            },
            "amount_detail": {
                "currency": "LKR",
                "gross": 100,
                "fee": 34.3,
                "net": 65.7,
                "exchange_rate": 1,
                "exchange_from": "LKR",
                "exchange_to": "LKR"
            },
            "payment_method": {
                "method": "VISA",
                "card_customer_name": "Saman Kumara",
                "card_no": "************4564"
            },
            "items": [
                {
                    "name": "Book reading Subscription",
                    "quantity": 1,
                    "currency": "LKR",
                    "unit_price": 100,
                    "total_price": 100
                }
            ]
        }
    ]
}
```
