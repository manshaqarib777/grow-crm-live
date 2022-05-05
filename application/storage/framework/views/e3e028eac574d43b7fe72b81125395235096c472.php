<div class="col-12" id="bill-totals-wrapper">
    <!--total amounts-->
    <div class="pull-right m-t-30 text-right">

        <table class="invoice-total-table">

            <!--invoice amount-->
            <tbody id="billing-table-section-subtotal" class="<?php echo e($bill->visibility_subtotal_row); ?>">
                <tr>
                    <td><?php echo e(cleanLang(__('lang.subtotal'))); ?></td>
                    <td id="billing-subtotal-figure">
                        <span><?php echo runtimeMoneyFormatPDF($bill->bill_subtotal); ?></span>
                    </td>
                </tr>
            </tbody>

            <!--discounted invoice-->
            <tbody id="billing-table-section-discounts" class="<?php echo e($bill->visibility_discount_row); ?>">
                <tr id="billing-sums-discount-container">
                    <?php if($bill->bill_discount_type == 'percentage'): ?>
                    <td><?php echo e(cleanLang(__('lang.discount'))); ?> <span class="x-small"
                            id="dom-billing-discount-type">(<?php echo e($bill->bill_discount_percentage); ?>%)</span>
                    </td>
                    <?php else: ?>
                    <td><?php echo e(cleanLang(__('lang.discount'))); ?> <span class="x-small"
                            id="dom-billing-discount-type">(<?php echo e(cleanLang(__('lang.fixed'))); ?>)</span></td>
                    <?php endif; ?>
                    <td id="billing-sums-discount">
                        <?php echo runtimeMoneyFormatPDF($bill->bill_discount_amount); ?>

                    </td>
                </tr>
                <tr id="billing-sums-before-tax-container" class="<?php echo e($bill->visibility_before_tax_row); ?>">
                    <td><?php echo app('translator')->get('lang.total'); ?> <span class="x-small">(<?php echo e(cleanLang(__('lang.before_tax'))); ?>)</span></td>
                    <td id="billing-sums-before-tax">
                        <span><?php echo runtimeMoneyFormatPDF($bill->bill_amount_before_tax); ?></span></td>
                </tr>
            </tbody>

            <!--taxes-->
            <tbody id="billing-table-section-tax" class="<?php echo e($bill->visibility_tax_row); ?>">
                <?php $__currentLoopData = $bill->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="billing-sums-tax-container" id="billing-sums-tax-container-<?php echo e($tax->tax_id); ?>">
                    <td><?php echo e($tax->tax_name); ?> <span class="x-small">(<?php echo e($tax->tax_rate); ?>%)</span></td>
                    <td id="invoice-sums-tax-<?php echo e($tax->tax_id); ?>">
                        <span><?php echo runtimeMoneyFormatPDF(($bill->bill_amount_before_tax * $tax->tax_rate)/100); ?></span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>


            <!--adjustment & invoice total-->
            <tbody id="invoice-table-section-total">
                <!--adjustment-->
                <tr class="billing-adjustment-container <?php echo e($bill->visibility_adjustment_row); ?>" id="billing-adjustment-container">
                    <td class="p-t-15 billing-adjustment-text" id="billing-adjustment-container-description"><?php echo e($bill->bill_adjustment_description); ?></td>
                    <td class="p-t-15 billing-adjustment-text">
                        <span id="billing-adjustment-container-amount"><?php echo runtimeMoneyFormatPDF($bill->bill_adjustment_amount); ?></span>
                    </td>
                </tr>

                <!--total-->
                <tr class="text-themecontrast" id="billing-sums-total-container">
                    <td class="billing-sums-total"><?php echo e(cleanLang(__('lang.total'))); ?></td>
                    <td id="billing-sums-total">
                        <span><?php echo runtimeMoneyFormatPDF($bill->bill_final_amount); ?></span>
                    </td>
                </tr>
            </tbody>

        </table>

    </div>

</div><?php /**PATH /var/www/html/grow-crm-live/application/resources/views/pages/bill/components/elements/totals-table.blade.php ENDPATH**/ ?>