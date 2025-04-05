---
title: Capture Payments
weight: 4
---

# Capture Payments

The PayHere [Capture API](https://support.payhere.lk/api-&-mobile-sdk/capture-api) allows you to capture your authorized Hold on Card payments on demand.

## Endpoint

```http request
POST /payhere/api/payments/capture
```

**Required Parameters**

-   `authorization_token`: Use the `authorization_token` retrieved from the [Authorize API](https://support.payhere.lk/api-&-mobile-sdk/authorize-api) in the request body.
-   `amount`: The amount to capture.
-   `description`: Additional details about the capture request.

## Request Body

_This request body is copied from the official PayHere knowledge base._

```json
{
    "authorization_token": "e34f3059-7b7d-4b62-a57c-784beaa169f4",
    "amount": 80.0,
    "deduction_details": "Item1 is out of stock"
}
```

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Successfully captured payment",
    "data": {
        "status_code": 2,
        "status_message": "Successfully received the VISA payment",
        "payment_id": 320025527952,
        "currency": "LKR",
        "amount": 100.0,
        "captured_amount": 80.0,
        "items": "Toy Car",
        "order_id": "Order12345",
        "md5sig": "27EE69A66E761D20429984A0CB0AFC27",
        "custom_1": "ABCD",
        "custom_2": null
    }
}
```
