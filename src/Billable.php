<?php

namespace Dasundev\PayHere;

use Dasundev\PayHere\Concerns\GenerateHash;
use Dasundev\PayHere\Concerns\HandleCheckout;
use Dasundev\PayHere\Concerns\ManagesPayments;
use Dasundev\PayHere\Concerns\ManagesSubscriptions;

trait Billable
{
    use GenerateHash;
    use HandleCheckout;
    use ManagesPayments;
    use ManagesSubscriptions;
}
