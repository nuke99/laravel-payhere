---
title: Cancel Subscriptions
weight: 9
---

# Cancel Subscriptions

The PayHere [Subscription Manager API](https://support.payhere.lk/api-&-mobile-sdk/subscription-manager-api) allows you to cancel a subscription.

## Endpoint

```http
DELETE /payhere/api/subscriptions/:id/cancel
```

**Required Parameter**

-   `id`: The `payhere_subscription_id` for the subscription.

## Response

_This response is copied from the official PayHere knowledge base._

```json
{
    "status": 1,
    "msg": "Successfully cancelled the subscription",
    "data": null
}
```
