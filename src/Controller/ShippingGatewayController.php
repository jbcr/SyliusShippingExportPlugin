<?php

/*
 * This file has been created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusShippingExportPlugin\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShippingGatewayController extends ResourceController
{
    public function getShippingGatewaysAction(Request $request, ?string $template): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        if (!$configuration->isHtmlRequest()) {
            $this->createRestView($configuration, [
                'shippingGateways' => $this->getParameter('bitbag.shipping_gateways'),
                'metadata' => $this->metadata,
            ]);
        }

        return $this->render($configuration->getTemplate(ResourceActions::UPDATE.'.html'), [
            'shippingGateways' => $this->getParameter('bitbag.shipping_gateways'),
            'metadata' => $this->metadata,
        ]);
    }
}
