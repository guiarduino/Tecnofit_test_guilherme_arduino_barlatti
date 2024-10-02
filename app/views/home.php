<div class="container mt-6">
    <div class="row">
        <?php if($ranking): ?>
            <?php foreach ($ranking as $index => $tabela): ?>
                <div class="col-md-6">
                    <h5><?php echo $index ?></h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="table-header-position">POS</th>
                                <th>Usuario</th>
                                <th class="table-header-value">Valor</th>
                                <th>Data Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tabela as $pos => $val): ?>
                                <?php if(isset($val->user_name)): ?>
                                    <tr class="color-<?php echo $val->position ?>">
                                        <td class="table-position"><?php print_r($val->position) ?></td>
                                        <td><?php print_r($val->user_name) ?></td>
                                        <td class="table-value"><?php print_r($val->pr_value) ?></td>
                                        <td><?php print_r($val->date_reg) ?></td>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="table-none-register">NENHUM REGISTRO</td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php elseif($ranking === []): ?>
            <div class="container-fluid">
                <span class="navbar-text">
                    <h1 class="text-title bd-title mb-3 mt-3">SEM DADOS</h1>
                </span>
            </div>
        <?php else: ?>
            <div class="container-fluid">
                <span class="navbar-text">
                    <h1 class="text-title bd-title mb-3 mt-3">ERRO NO SISTEMA</h1>
                </span>
            </div>
        <?php endif ?>
    </div>
</div>
