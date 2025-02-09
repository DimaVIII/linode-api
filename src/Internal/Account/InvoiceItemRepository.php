<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2018 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\Internal\Account;

use Linode\Entity\Account\InvoiceItem;
use Linode\Entity\Entity;
use Linode\Internal\AbstractRepository;
use Linode\LinodeClient;
use Linode\Repository\Account\InvoiceItemRepositoryInterface;

/**
 * {@inheritdoc}
 */
class InvoiceItemRepository extends AbstractRepository implements InvoiceItemRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @param int $invoiceId The ID of the Invoice we are accessing InvoiceItems for
     */
    public function __construct(LinodeClient $client, protected int $invoiceId)
    {
        parent::__construct($client);
    }

    /**
     * {@inheritdoc}
     */
    protected function getBaseUri(): string
    {
        return sprintf('/account/invoices/%s/items', $this->invoiceId);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSupportedFields(): array
    {
        return [
            InvoiceItem::FIELD_LABEL,
            InvoiceItem::FIELD_FROM,
            InvoiceItem::FIELD_TO,
            InvoiceItem::FIELD_AMOUNT,
            InvoiceItem::FIELD_QUANTITY,
            InvoiceItem::FIELD_UNITPRICE,
            InvoiceItem::FIELD_TYPE,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function jsonToEntity(array $json): Entity
    {
        return new InvoiceItem($this->client, $json);
    }
}
