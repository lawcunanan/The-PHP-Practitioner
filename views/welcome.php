<?php
require_once "./bootstrap.php";

if (isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    echo $auth->deleteUser($delete);
}

require_once "./views/header.php";
?>

<section class="card">
    <h2>Welcome</h2>
    <p class="small">User list. Use the actions column to manage users.</p>
    <p><a href="/php-practitioner/">Sign Out</a></p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $userModel->getAllUsers();

                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                    echo "<td>" . date('M d, Y', strtotime($user['reg_date'])) . "</td>";
                    echo "<td>
                      <form method='post' style='display:inline;'>
                          <button type='submit' name='delete' value='" . htmlspecialchars($user['username']) . "'>Delete</button>
                      </form>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php require_once "./views/footer.php"; ?>