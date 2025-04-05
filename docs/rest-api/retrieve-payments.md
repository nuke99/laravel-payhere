---
title: Retrieve Payments
weight: 2
---

# Retrieve Payments

The PayHere [Retrieval API](https://support.payhere.lk/api-&-mobile-sdk/retrieval-api) allows you to retrieve the details of successful payments.

## Endpoint

```http
GET /payhere/api/payments/:id
```

**Required Parameters**

-   `id`: The identifier for the order.

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Payments with order_id:LP8006126139_2019-12-06",
    "data": [
        {
            "payment_id": 320025071278,
            "order_id": "LP8006126139",
            "date": "2020-01-16 16:21:02",
            "description": "Policy No. LP8006126139 - Outstanding Payment",
            "status": "RECEIVED",
            "currency": "LKR",
            "amount": 50,
            "customer": {
                "fist_name": "Saman",
                "last_name": "Perera",
                "email": "samanperera@gmail.com",
                "phone": "+94771234567",
                "delivery_details": {
                    "address": "N0.1, Galle Road",
                    "city": "Colombo",
                    "country": "Sri Lanka"
                }
            },
            "amount_detail": {
                "currency": "LKR",
                "gross": 500,
                "fee": 14.5,
                "net": 485.5,
                "exchange_rate": 1,
                "exchange_from": "LKR",
                "exchange_to": "LKR"
            },
            "payment_method": {
                "method": "VISA",
                "card_customer_name": "S Perera",
                "card_no": "************1234"
            },
            "items": null
        }
    ]
}
```
