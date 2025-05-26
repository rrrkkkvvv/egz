const refs = {
  sendButton: document.querySelector("#send_btn"),
  generateButton: document.querySelector("#generate_btn"),
  messageInput: document.querySelector("#message_input"),
  messageTemplate: document.querySelector("#message_template"),
  chatBlock: document.querySelector(".chat"),
};
const krzysztofMessages = [
  "Świetnie!",
  "Kto gra główną rolę?",
  "Lubisz filmy Tego reżysera?",
  "Będę 10 minut wcześniej",
  "Może kupimy sobie popcorn?",
  "Ja wolę Colę",
  "Zaproszę jeszcze Grześka",
  "Tydzień temu też byłem w kinie na Diunie",
  "Ja funduję bilety",
];
const addMessageToChat = (imgSrc, messageClass, messageText) => {
  const messageBlock = document.createElement("div");
  messageBlock.setAttribute("class", `${messageClass} message`);
  const img = document.createElement("img");
  img.setAttribute("src", imgSrc);
  const p = document.createElement("p");
  p.textContent = messageText;
  messageBlock.appendChild(img);
  messageBlock.appendChild(p);

  refs.chatBlock.appendChild(messageBlock);
  messageBlock.scrollIntoView();
};
refs.sendButton.addEventListener("click", () => {
  const message = refs.messageInput.value;
  addMessageToChat("Jolka.jpg", "jolanta_message", message);
});

refs.generateButton.addEventListener("click", () => {
  const message =
    krzysztofMessages[Math.floor(Math.random() * krzysztofMessages.length)];
  addMessageToChat("Krzysiek.jpg", "krzysztof_message", message);
});
