<div id="admin_portal">
    <h2>Employee Directory Search</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="search_customers">
        <input type="hidden" name="email" value="<?php echo $email_address; ?>">
        
        <label>Search by Last Name:</label>
        <input type="text" name="last_name">
        <input type="submit" value="Search">
    </form>

    <?php if (isset($search_results)) : ?>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
            </tr>
            <?php foreach ($search_results as $result) : ?>
            <tr>
                <td><?php echo $result['first_name']; ?></td>
                <td><?php echo $result['last_name']; ?></td>
                <td><?php echo $result['email_address']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>