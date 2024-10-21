<main class="dashboard">
    <header>
        <h1>Welcome Admin!</h1>
        <p>Dashboard</p>
    </header>
    <section class="cards">
        <div class="card">
            <div class="card-content">
                <h2>4</h2>
                <p>Registered Users</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>3</h2>
                <p>Agents</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>1</h2>
                <p>Builder</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>6</h2>
                <p>Properties</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>2</h2>
                <p>No. of Apartments</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>4</h2>
                <p>No. of Houses</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>0</h2>
                <p>No. of Buildings</p>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <h2>0</h2>
                <p>No. of Flats</p>
            </div>
        </div>
    </section>
    <section class="table-section">
        <h2>Agent Details</h2>
        <form id="agent-form">
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="agentName" placeholder="Agent Name" required>
            <input type="text" id="agentID" placeholder="Agent ID" required>
            <button type="submit">Add Agent</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Agent Name</th>
                    <th>Agent ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="agent-table-body">
                <!-- Rows will be added here by JavaScript -->
            </tbody>
        </table>
    </section>
</main>
