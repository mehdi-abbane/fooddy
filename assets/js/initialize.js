if (!is_win_large) {
  $(".a-items-in-menus").each((i, el) => {
    el.style.paddingLeft = `${el.dataset.indent}px`;
  });
}
