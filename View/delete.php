<?php
include '../Controller/CommandeC.php';

$commandeC = new CommandeC();

// Check if a POST request with "id" is set (assuming deletion form submission)
if (isset($_POST["id"])) {
  // Call deleteCommande function (assuming it exists)
  $commandeC->deleteCommande($_POST["id"]);
  // Optional: Redirect after deletion (adjust URL as needed)
  header('Location: list.php');
  exit();
}

// Call the listCommandes function to retrieve all commandes
$commandes = $commandeC->listCommandes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Commandes</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%; /* Optional: Set a width for the table */
    }

    th,
    td {
      padding: 5px;
      border: 1px solid #ddd; /* Add borders to table cells */
      text-align: left; /* Optional: Align content to the left */
    }

    th {
      background-color: #f2f2f2; /* Optional: Set background color for table headers */
    }
  </style>
</head>

<body>
  <h1>Liste des Commandes</h1>

  <form method="post" action="">  <label for="id">ID de la commande à supprimer:</label>
    <input type="number" name="id" id="id" required> <button type="submit">Supprimer</button>
  </form>

  <?php if (isset($commandes) && !empty($commandes)) : ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Date de Commande</th>
          <th>Prix Total</th>
          <th>Adresse de Livraison</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($commandes as $commande) : ?>
          <tr>
            <td><?php echo $commande['id']; ?></td>
            <td><?php echo $commande['date']->format('Y-m-d'); ?> </td>
            <td><?php echo $commande['prix_total']; ?></td>
            <td><?php echo $commande['adresse_livraison']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <p>Aucune commande trouvée.</p>
  <?php endif; ?>
</body>

</html>
