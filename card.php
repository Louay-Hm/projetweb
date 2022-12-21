<?php
// On récupère les paramètres GET depuis l'URL
$montant = isset($_GET["amount"]) ? $_GET["amount"] : 0.0;
$carte = isset($_GET["card"]) ? $_GET["card"] : "";

if ($montant > 0) {
    echo "Merci votre achat de : " . $montant . "€<br>";
    echo "Le type de carte est : " . $carte;
} else {
    echo "Le montant doit être supérieur à 0";
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Carte de crédit</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <h3>Paiement par carte de crédit</h3>
    <!-- Par défaut, le formulaire passe les paramètres dans l'URL, en méthode GET -->
    <form action="">
      <table>
        <tr>
          <td>Montant à payer:</td>
          <td><input type="number" step="0.01" name="amount" /></td>
        </tr>
        <tr>
          <td>Payer par:</td>
          <td>
            <input type="radio" name="card" id="mastercard" value="MasterCard"/>
            <label for="mastercard">MasterCard</label><br />
            <input type="radio" name="card" id="visa" value="Visa"/>
            <label for="visa">Visa</label><br />
            <input type="radio" name="card" id="ticket" value="ticketrestaurany"/>
            <label for="ticket">Ticket restaurany</label><br />
            <input type="radio" name="card" id="americanexpress" value="American Express"/>
            <label for="americanexpress">Americal Express</label><br /><br />
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="submit" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
