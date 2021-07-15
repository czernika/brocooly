const replyLinks = document.querySelectorAll('.reply');

replyLinks.forEach(link => {
	link.addEventListener('click', e => {
		e.preventDefault();

		const respondForm = document.querySelector('#respond');
		const parentComment = respondForm.querySelector('#comment_parent');
		const respondTitle = respondForm.querySelector('#reply-title');

		const belowEl   = link.getAttribute('data-belowelement');
		const commentId = link.getAttribute('data-commentid');
		const respondTitleText = link.getAttribute('data-replyto');
		const belowTo = document.querySelector(`#${belowEl}`);

		respondForm.remove();
		parentComment.value = commentId;
		respondTitle.textContent = respondTitleText;
		belowTo.insertAdjacentHTML('afterend', respondForm.outerHTML);
	});
});
