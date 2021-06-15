<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="viewExpense __viewExpense">
    <header class="expense-header">
        <div class="logo">
            <div class="logo__icon">
                <svg viewBox="0 0 640 512" width="100" title="shoe-logo" id="logo">
                    <path
                        d="M192 160h32V32h-32c-35.35 0-64 28.65-64 64s28.65 64 64 64zM0 416c0 35.35 28.65 64 64 64h32V352H64c-35.35 0-64 28.65-64 64zm337.46-128c-34.91 0-76.16 13.12-104.73 32-24.79 16.38-44.52 32-104.73 32v128l57.53 15.97c26.21 7.28 53.01 13.12 80.31 15.05 32.69 2.31 65.6.67 97.58-6.2C472.9 481.3 512 429.22 512 384c0-64-84.18-96-174.54-96zM491.42 7.19C459.44.32 426.53-1.33 393.84.99c-27.3 1.93-54.1 7.77-80.31 15.04L256 32v128c60.2 0 79.94 15.62 104.73 32 28.57 18.88 69.82 32 104.73 32C555.82 224 640 192 640 128c0-45.22-39.1-97.3-148.58-120.81z" />
                </svg>
            </div>
            <div class="logo__text">
                <h1 id="brand-name">EXPENSE -
                    E<?php echo isset($data['exp']['0']['date_created']) ? date('Ymd', strtotime( $data['exp']['0']['date_created'])): 'N/A'; ?>
                </h1>
                <p class="tagline">expense incurred
                    on:<?php echo isset($data['exp']['0']['date_created']) ? $data['exp']['0']['date_created']: 'N/A'; ?>
                    staged at
                    <?php echo isset($data['exp']['0']['time_created']) ? $data['exp']['0']['time_created']: 'N/A'; ?>
                </p>
            </div>
        </div>
    </header>

    <div id="table-expense-i">
        <header>
            <span>
                <?php echo isset($data['exp']['0']['date_created']) ? $data['exp']['0']['date_created']: 'N/A'; ?>
            </span>
            <ul>
                <li>
                    <a href="">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-print"></i>
                    </a>
                </li>
            </ul>
        </header>
        <table class="table-expense-2">
            <thead>
                <tr>
                    <th>
                        Expense Item
                    </th>
                    <th>
                        Date created
                    </th>
                    <th>
                        Expense Amount(Ksh)
                    </th>
                    <th>
                        Added By
                    </th>
                    <th>
                        At
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $expense = getNetExpenses($data['exp']['0']['date_created'], $data['db']); 
                while ($exp2 = $expense->fetch_assoc()) :
                ?>
                <tr>
                    <td>
                        <?php echo isset($exp2['expense_item']) ? $exp2['expense_item'] : 'N/A'; ?>
                    </td>
                    <td>
                        <?php echo isset($exp2['date_created']) ? $exp2['date_created'] : 'N/A'; ?>
                    </td>
                    <td>
                        <a
                            href="#!"><?php echo isset($exp2['expense_cost']) ? number_format($exp2['expense_cost']) : 'N/A'; ?></a>
                    </td>
                    <td>
                        <span
                            class="label label-default"><?php echo isset($exp2['created_by']) ? $exp2['created_by'] : 'N/A'; ?></span>
                    </td>
                    <td>
                        <span
                            class="label label-success"><?php echo isset($exp2['time_created']) ? $exp2['time_created'] : 'N/A'; ?></span>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <h1>
        Total:<?php echo number_format(getExpenseTotal($data['date'], $data['db'])); ?>
    </h1>
</body>

</html>