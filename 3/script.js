const quoteBlocks = document.querySelectorAll("blockquote");
const setNextQuote = (currentQuoteIndex) => {
  quoteBlocks.forEach((quoteBlock, index) => {
    if (index === currentQuoteIndex) {
      quoteBlock.classList.remove("currentQuote");
    }
    if (
      index === currentQuoteIndex + 1 ||
      (currentQuoteIndex + 1 === quoteBlocks.length && index === 0)
    ) {
      quoteBlock.classList.add("currentQuote");
    }
  });
};
quoteBlocks.forEach((quoteBlock, index) => {
  quoteBlock.addEventListener("click", () => {
    setNextQuote(index);
  });
});
