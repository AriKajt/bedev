<?php include_once basePath('views/partials/header.php') ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">    
        <h1>Kopije</h1>
    </div>
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
            <?= $message['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Barkod</th>
                <th>Medij</th>
                <th>Dostupan</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($copies as $copy): ?>
                <tr>
                    <td><?= $copy['id'] ?></td>
                    <td><?= $copy['naslov'] ?></a></td>
                    <td><?= $copy['barcode'] ?></td>
                    <td><?= $copy['medij'] ?></td>
                    <td><?= $copy['dostupan'] ?></td>
                    <td>
                        <a href="/copies/edit?id=<?= $copy['id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi"><i class="bi bi-pencil"></i></a>
                        <form id="delete-form" class="hidden d-inline" method="POST" action="/copies/destroy">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="code" value="<?= $copy['id'] ?>">
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Izbriši"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="col-2">
        <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Povratak"><i class="bi bi-arrow-return-left"></i></a>
    </div>
</main>

<?php include_once basePath('views/partials/footer.php') ?>  