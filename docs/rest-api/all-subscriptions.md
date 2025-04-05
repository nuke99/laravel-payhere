---
title: All Subscriptions
weight: 7
---

# All Subscriptions

The PayHere [Subscription Manager API](https://support.payhere.lk/api-&-mobile-sdk/subscription-manager-api) allows you to retrieve all subscriptions.

## Endpoint

```http
GET /payhere/api/subscriptions
```

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Found 1 subscriptions",
    "data": [
        {
            "subscription_id": 420075032251,
            "order_id": "Order0003",
            "date": "2018-10-04 20:24:52",
            "description": "Book reading Subscription",
            "recurring": "Charged every month for 3 years",
            "status": "ACTIVE",
            "amount": 100,
            "currency": "LKR",
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
        }
    ]
}
```
