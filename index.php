<?php 
    require "php/app.php";

    if(isset($_GET['giorno'])) {
        $giorno = new \DateTime($_GET['giorno']);
        $settimana = new Settimana($giorno);
    } else {
        $settimana = new Settimana();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="css/appuntamenti.css" rel="stylesheet">
    <title>Appuntamenti</title>
</head>

<body>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <!--
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Appuntamenti</h1>
            </div>
        </div>
      -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <p class="font-weight-bold text-left no-margin-bottom"><a href="index.php?giorno=<?= $settimana->lunediPrecedente->format('Y-m-d') ?>"><</a></p>
                </div>
                <div class="col-md-10">
                    <p class="font-weight-bold text-center no-margin-bottom">Settimana dal <?= $settimana->lunedi->format('d/m/Y') ?> al <?= $settimana->domenica->format('d/m/Y') ?></p>
                </div>
                <div class="col-md-1">
                    <p class="font-weight-bold text-right no-margin-bottom"><a href="index.php?giorno=<?= $settimana->lunediSuccessivo->format('Y-m-d') ?>">></a></p>
                </div>
            </div>
            <!-- DIV CALENDARIO -->
            <div class="row">
                <div class="col-md-3 p-1">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr> 
                                <th scope="col" colspan="3" class="tabella-giorno">Lunedì - <?= $settimana->lunedi->format('d/m/Y') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($listaOrari->Filtra("Lunedì") as $orario): 
                            ?>
                            <tr>
                                <th scope="row" class="tabella-data"><?= $orario->ora; ?></th>
                                <?php
                                    $cognomenome = CognomeNome();
                                    if($cognomenome): 
                                ?>
                                <td><span class="tabella-persona"><?= $cognomenome ?></span><span class="tabella-nota"> <?= Note(); ?></span></td>
                                <td class="tabella-btn"><button type="button" class="btn btn-danger btn-sm btn-block btn-square" data-toggle="modal" data-target="#rimuoviModal" data-id="1" data-nome="<?= $cognomenome ?>">X</button></td>
                                <?php endif; ?>
                                <?php
                                    if(!$cognomenome): 
                                ?>
                                <td colspan="2"><button type="button" class="btn btn-info btn-sm btn-block btn-rect">+</button></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

                <div class="col-md-3 p-1">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3" class="tabella-giorno">Martedì - <?= $settimana->martedi->format('d/m/Y') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                foreach($listaOrari->Filtra("Martedì") as $orario): 
                            ?>
                            <tr>
                                <th scope="row" class="tabella-data"><?= $orario->ora; ?></th>
                                <?php
                                    $cognomenome = CognomeNome();
                                    if($cognomenome): 
                                ?>
                                <td><span class="tabella-persona"><?= $cognomenome ?></span><span class="tabella-nota"> <?= Note(); ?></span></td>
                                <td class="tabella-btn"><button type="button" class="btn btn-danger btn-sm btn-block btn-square" data-toggle="modal" data-target="#rimuoviModal" data-id="1" data-nome="<?= $cognomenome ?>">X</button></td>
                                <?php endif; ?>
                                <?php
                                    if(!$cognomenome): 
                                ?>
                                <td colspan="2"><button type="button" class="btn btn-info btn-sm btn-block btn-rect">+</button></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3 p-1">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3" class="tabella-giorno">Mercoledì - <?= $settimana->mercoledi->format('d/m/Y') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                foreach($listaOrari->Filtra("Mercoledì") as $orario): 
                            ?>
                            <tr>
                                <th scope="row" class="tabella-data"><?= $orario->ora; ?></th>
                                <?php
                                    $cognomenome = CognomeNome();
                                    if($cognomenome): 
                                ?>
                                <td><span class="tabella-persona"><?= $cognomenome ?></span><span class="tabella-nota"> <?= Note(); ?></span></td>
                                <td class="tabella-btn"><button type="button" class="btn btn-danger btn-sm btn-block btn-square" data-toggle="modal" data-target="#rimuoviModal" data-id="1" data-nome="<?= $cognomenome ?>">X</button></td>
                                <?php endif; ?>
                                <?php
                                    if(!$cognomenome): 
                                ?>
                                <td colspan="2"><button type="button" class="btn btn-info btn-sm btn-block btn-rect">+</button></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3 p-1">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3" class="tabella-giorno">Venerdì - <?= $settimana->venerdi->format('d/m/Y') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                foreach($listaOrari->Filtra("Venerdì") as $orario): 
                            ?>
                            <tr>
                                <th scope="row" class="tabella-data"><?= $orario->ora; ?></th>
                                <?php
                                    $cognomenome = CognomeNome();
                                    if($cognomenome): 
                                ?>
                                <td><span class="tabella-persona"><?= $cognomenome ?></span><span class="tabella-nota"> <?= Note(); ?></span></td>
                                <td class="tabella-btn"><button type="button" class="btn btn-danger btn-sm btn-block btn-square" data-toggle="modal" data-target="#rimuoviModal" data-id="1" data-nome="<?= $cognomenome ?>">X</button></td>
                                <?php endif; ?>
                                <?php
                                    if(!$cognomenome): 
                                ?>
                                <td colspan="2"><button type="button" class="btn btn-info btn-sm btn-block btn-rect">+</button></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- END DIV CALENDARIO -->

        </div>
        <!-- /container -->

        <div class="modal fade" id="rimuoviModal" tabindex="-1" role="dialog" aria-labelledby="rimuoviModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rimuoviModalLabel">Attenzione</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h1 id="recipient-name"></h1>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger">Rimuovo</button>
                </div>
            </div>
        </div>
    </div>

    </main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('#rimuoviModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var nome = button.data('nome') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Attenzione rimuovo id:' + id + '?')
            modal.find('#recipient-name').text(nome)
        });
    </script>

</body>

</html>