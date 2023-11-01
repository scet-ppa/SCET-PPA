// Função para remover uma notificação individual
const removeNotification = (event) => {
    event.target.parentElement.remove();
};

// Adicionar evento de clique para cada botão de remoção
const removeButtons = document.querySelectorAll(".remove-button");
removeButtons.forEach((button) => {
    button.addEventListener("click", removeNotification);
});

// Função para limpar todas as notificações
const clearAllNotifications = () => {
    const notifications = document.querySelectorAll(".notification");
    notifications.forEach((notification) => {
        notification.remove();
    });
};

// Função para silenciar notificações
const muteNotifications = () => {
    // Implementar a lógica de silenciar notificações aqui
    alert("Notificações silenciadas");
};

// Adicionar evento de clique para o botão "Limpar Tudo"
document.getElementById("clear-all").addEventListener("click", clearAllNotifications);

// Adicionar evento de clique para o botão "Silenciar Notificações"
document.getElementById("mute-notifications").addEventListener("click", muteNotifications);