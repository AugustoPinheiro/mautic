<?php

/*
 * @copyright   2018 Mautic Inc. All rights reserved
 * @author      Mautic, Inc.
 *
 * @link        https://www.mautic.com
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\IntegrationsBundle\Form\Type;


use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

trait NotBlankIfPublishedConstraintTrait
{
    /**
     * Get not blank restraint if published
     *
     * @return Callback
     */
    private function getNotBlankConstraint()
    {
        return new Callback(
            function ($validateMe, ExecutionContextInterface $context) {
                $data = $context->getRoot()->getData();
                if (!empty($data['is_published']) && empty($validateMe)) {
                    $context->buildViolation('mautic.core.value.required')->addViolation();
                }
            }
        );
    }
}