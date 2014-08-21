
<?php $eot=<<<'EOT'

EOT;
?>
<pre><code>{{{$eot}}}</code></pre>
<?php $eot=<<<'EOT'
BEGIN
--
SET @s = CONCAT('SELECT store.sCustNum, BillToId, sNumber, sSalesman, sName, sAddress, sCity, sState, sZip,
                totals1.purchases as purchases1,
                totals1.retail as retail1,
                totals2.purchases as purchases2,
                totals2.retail as retail2,
                totals1.itemCategory,
                totals1.invoiceNumber,
                totals1.completedBy,
                totals1.void,
                totals1.invoiceDate

            FROM stores AS store

            RIGHT JOIN
                (
                SELECT invDetails.sCustNum,
                        SUM(invItems.itemTotalCost) AS purchases,
                        SUM(invItems.itemRetailPrice) AS retail,
                        invDetails.invoiceNumber,
                        invDetails.repNumber,
                        items.itemCategory,
                        invDetails.completedBy,
                        invDetails.void,
                        invDetails.invoiceDate

                FROM invoice_items AS invItems
                JOIN invoice_details AS invDetails
                                ON invDetails.invoiceNumber = invItems.invNumber

                JOIN inventories AS items ON invItems.itemNumber = items.itemCode

                WHERE str_to_date(invDetails.invoiceDate, '%m/%d/%Y')
                    BETWEEN str_to_date("', fromDate ,'", '%m/%d/%Y')
                    AND str_to_date("' , toDate ,'", '%m/%d/%Y')
                ', appendWhereString, '

                GROUP BY invDetails.sCustNum
                ) as totals1
                ON store.sCustnum = totals1.sCustNum

          RIGHT JOIN
                (
                SELECT invDetails.sCustNum,
                        SUM(invItems.itemTotalCost) AS purchases,
                        SUM(invItems.itemRetailPrice) AS retail,
                        invDetails.invoiceNumber,
                        invDetails.completedBy,
                        items.itemCategory,
                        invDetails.void,
                        invDetails.invoiceDate

                FROM invoice_items AS invItems
                JOIN invoice_details AS invDetails
                                ON invDetails.invoiceNumber = invItems.invNumber

                JOIN inventories AS items ON invItems.itemNumber = items.itemCode

                WHERE str_to_date(invDetails.invoiceDate, '%m/%d/%Y')
                    BETWEEN str_to_date("', fromDate ,'", '%m/%d/%Y')
                    AND str_to_date("' , toDate ,'", '%m/%d/%Y')

                ', appendWhereString, '

                GROUP BY invDetails.sCustNum
                ) as totals2
                ON store.sCustnum = totals2.sCustNum

            Where ', whereString,'

        ORDER BY purchases1 DESC');

        -- SELECT @s;

        -- Execute crosstab
        PREPARE stmt3 FROM @s;
        EXECUTE stmt3;
        DEALLOCATE PREPARE `statem`;

END
EOT;
?>
<pre><code>{{{$eot}}}</code></pre>
