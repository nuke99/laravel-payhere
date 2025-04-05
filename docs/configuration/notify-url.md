---
title: Notify URL
weight: 3
---

# Notify URL

Laravel PayHere automatically handles PayHere notifications, but you can add your custom notify url if needed.

To add your notify url, use the following environment variable:

```dotenv
PAYHERE_NOTIFY_URL=your-payhere-notify-url
```

> [!CAUTION]
> Customizing the notify url is not recommended, as the default is designed with security in mind. If you choose to modify it, please review how the default notify url works and ensure the same security measures are applied.
