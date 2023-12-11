<?php
include 'db.php';

// Check if the form is submitted with landlord_email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['landlord_email'])) {
  // Get the input email from the form
  $landlord_email = $_POST['landlord_email'];

  // SQL query to fetch lease agreements for the specific landlord
  $sql = "SELECT * FROM leaseagreements WHERE landlord_email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $landlord_email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Display the lease agreements
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Assured Shorthold Tenancy Agreement</title>
          <style>
            body {
              font-family: Arial, sans-serif;
              margin: 20px;
            }
            h1 {
              text-align: center;
            }
            p {
              margin: 5px 0;
            }
          </style>
        </head>
        <body>';

      // Display Lease Agreement details
      echo '<h1>Assured Shorthold Tenancy Agreement</h1>';
      echo '<p>This agreement is made the day of: ' . date('d F Y', strtotime($row['move_in_date'])) . '</p>';
      echo '<p>Property: ' . $row['property_address'] . '</p>';
      echo '<p>Landlord: ' . $row['landlord_name'] . '</p>';
      echo '<p>Landlord\'s address: ' . $row['landlord_address'] . '</p>';
      echo '<p>Tenant(s): ' . $row['tenant_name'] . '</p>';
      // echo '<p>Contents: ' . $row['contents'] . '</p>';
      echo '<p>Term: Commencing on ' . date('d F Y', strtotime($row['move_in_date'])) . '</p>';
      echo '<p>Rent: £' . $row['rent_amount'] . ' per month</p>';
      echo '<p>Payment: In advance on the 1st of each month</p>';
      echo '<p>Deposit: £' . $row['deposit_amount'] . ' to be protected by the Deposit Protection Service (DPS)</p>';

      // Display Definitions
      echo '<h2>1. Definitions</h2>';
      echo '<p>1.1 Landlord: ' . $row['landlord_name'] . '</p>';
      echo '<p>1.2 Property: ' . $row['property_address'] . '</p>';
      echo '<p>1.3 Tenancy: Commencing on ' . date('d F Y', strtotime($row['move_in_date'])) . '</p>';
      echo '<p>1.4 Tenant: ' . $row['tenant_name'] . '</p>';

      // Display Main Terms
      echo '<h2>2. Main Terms</h2>';
      echo '<p>2.1 The Landlord agrees to let and the Tenant agrees to take the Property and Contents for the Term at the Rent payable above.</p>';
      echo '<p>2.2 The Tenant pays the Deposit as security for the performance of the Tenant’s obligations and to compensate the Landlord for any breach of those obligations.</p>';

      // Display Tenant's Obligations
      echo '<h2>3. Tenant\'s Obligations</h2>';
      echo '<p>3.1 To pay the rent on the days and in the manner specified in this Agreement.</p>';
      echo '<p>3.2 To pay the administration and bank costs for any rent payment dishonored by the Tenant.</p>';
      // Add more obligations as needed

      // Display Landlord's Obligations
      echo '<h2>4. Landlord\'s Obligations</h2>';
      echo '<p>4.1 To pay for all assessments and outgoings in respect of the Property (other than those mentioned in 3.6 above) and keep in repair the structure and exterior of the Property...</p>';
      // Add more obligations as needed

      // Display Deposit Details
      echo '<h2>5. Deposit</h2>';
      echo '<p>5.1 The Landlord will ensure that the Deposit is protected in a government-authorized tenancy deposit scheme</p>';
      // Add more deposit details as needed

      // Display Notices and Possession
      echo '<h2>6. Notices and Possession</h2>';
      echo '<p>6.1 Any notice served by the Landlord on the Tenant shall be sufficiently served if sent by standard first or second class post to the Tenant at the Property...</p>';
      // Add more notices and possession details as needed

      // Display Special Conditions
      echo '<h2>7. Special Conditions</h2>';
      echo '<p>No special conditions apply in this Agreement.</p>';

      // Display Signatures
      echo '<h2>Signatures</h2>';
      echo '<p>Name: ' . $row['landlord_name'] . ' | Role: Landlord | Signature: ' . $row['landlord_name'] . ' | Date: ' . date('d M Y H:i:s') . '</p>';
      echo '<p>Name: ' . $row['tenant_name'] . ' | Role: Tenant | Signature: ' . $row['tenant_name'] . ' | Date: ' . date('d M Y H:i:s') . '</p>';

      echo '</body>
        </html>';

      // Include the necessary scripts for PDF generation
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>';

      // Add buttons for exporting as HTML and PDF
      echo '<button id="exportHtml" class="btn btn-secondary">Export as HTML</button>';
      echo '<button id="exportPdf" class="btn btn-secondary">Export as PDF</button>';

      // Add the script for handling HTML to PDF conversion
      echo '<script>
        document.getElementById("exportHtml").addEventListener("click", function () {
          var htmlContent = document.documentElement.outerHTML;
          var blob = new Blob([htmlContent], { type: "text/html" });
          var link = document.createElement("a");
          link.href = window.URL.createObjectURL(blob);
          link.download = "lease_agreement.html";
          link.click();
        });

        document.getElementById("exportPdf").addEventListener("click", function () {
          var element = document.body;
          html2pdf(element);
        });
      </script>';
    }
  } else {
    echo "No lease agreements found for the specified landlord email.";
  }
} else {
  // Display a form to input email
  echo '<form method="POST" action="">
            <label for="landlord_email">Landlord Email:</label>
            <input type="text" id="landlord_email" name="landlord_email">
            <input type="submit" value="View Lease Agreements">
          </form>';
  echo '</div>'; // Close the container

  echo '</body>
  </html>';
  exit; // Stop further execution if the form is not submitted
}
?>