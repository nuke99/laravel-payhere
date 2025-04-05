---
title: Charge Payments
weight: 3
---

# Charge Payments

The PayHere [Charging API](https://support.payhere.lk/api-&-mobile-sdk/charging-api) allows you to charge your pre-approved customers on demand.

## Endpoint

```http request
POST /payhere/api/payments/charge
```

**Required Parameters**

-   `type`: Indicates the type of transaction (PAYMENT or AUTHORIZE).
-   `order_id`: The id for the order.
-   `items`: The item title or order number.
-   `currency`: The currency for the transaction.
-   `amount`: The amount for the transaction.
-   `customer_token`: The encrypted token received by [Preapproval API](https://support.payhere.lk/api-&-mobile-sdk/preapproval-api) notification.

**Optional Parameters**

-   `custom_1`: Custom parameter 1.
-   `custom_2`: Custom parameter 2.
-   `notify_url`: The custom notify url.
-   `itemList`: The list of items for the payment.

## Request Body

_This request body is copied from the official PayHere knowledge base._

```json
{
    "type": "PAYMENT",
    "order_id": "Order12345",
    "items": "Taxi Hire 123",
    "currency": "LKR",
    "amount": 345.67,
    "customer_token": "59AFEE022CC69CA39D325E1B59130862",
    "custom_1": "custom parameter 1",
    "custom_2": null,
    "notify_url": "https://www.abc.com/hire/notify",
    "itemList": [
        {
            "name": "Hire from Colombo 1 to Colombo 4",
            "number": "HIRE_12345",
            "quantity": 1,
            "unit_amount": 300.0
        },
        {
            "name": "Tax",
            "number": "TAX_12345",
            "quantity": 1,
            "unit_amount": 45.67
        }
    ]
}
```

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Automatic payment charged successfully",
    "data": {
        "order_id": "Order12345",
        "items": "Taxi Hire 123",
        "currency": "LKR",
        "amount": 345.67,
        "custom_1": null,
        "custom_2": null,
        "payment_id": 320025021815,
        "status_code": 2,
        "status_message": "Successfully completed the test tokenized payment.",
        "md5sig": "A098FEBCC06293734641770555B4D569",
        "authorization_token": "74d7f304-7f9d-481d-b47f-6c9cad32d3d5"
    }
}
```
