---
title: Retry Subscriptions
weight: 8
---

# Retry Subscriptions

The PayHere [Subscription Manager API](https://support.payhere.lk/api-&-mobile-sdk/subscription-manager-api) allows you to retry failed a subscription.

## Endpoint

```http
POST /payhere/api/subscriptions/:id/retry
```

**Required Parameter**

-   `id`: The `payhere_subscription_id` for the subscription.

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Recurring payment charged successfully",
    "data": null
}
```
