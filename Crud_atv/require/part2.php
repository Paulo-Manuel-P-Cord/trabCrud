</div>
</div>
</div>
<!-- Modals -->

<!-- Conteúdo do modal -->
<div class="modal fade" id="informacaoModal" tabindex="-1" aria-labelledby="informacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="informacaoModalLabel">Informações da sua conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Nome: <?php echo htmlspecialchars($user['nome']); ?></p>
                <p>Senha: <?php echo htmlspecialchars($user['senha']); ?></p>
                <p>Celular: <?php echo htmlspecialchars($user['cell']); ?></p>
                <p>CPF: <?php echo htmlspecialchars($user['cpf']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Data de Nascimento: <?php echo htmlspecialchars($user['nasc']); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- TrocarSenha Modal -->
<div class="modal fade" id="trocarSenhaModal" tabindex="-1" aria-labelledby="trocarSenhaModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trocarSenhaModalLabel">Trocar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../ações/trocar_senha.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="senhaAtual" class="form-label">Senha Atual</label>
                        <input type="password" class="form-control" id="senhaAtual" name="senha_atual" required>
                    </div>
                    <div class="mb-3">
                        <label for="novaSenha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="novaSenha" name="nova_senha" minlength="6" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmar_senha" minlength="6" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Excluir Conta Modal -->
<div class="modal fade" id="excluirContaModal" tabindex="-1" aria-labelledby="excluirContaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirContaModalLabel">Excluir Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../ações/excluir_conta.php" method="POST">
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript do Bootstrap e dependências -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>