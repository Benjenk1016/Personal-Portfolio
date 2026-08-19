document.addEventListener("DOMContentLoaded", () => {
	const firstResumeRow = document.getElementById("st");

	if (!firstResumeRow) {
		return;
	}

	fetch("json/resumemodded.json")
		.then((response) => {
			if (!response.ok) {
				throw new Error(`Resume request failed: ${response.status}`);
			}
			return response.json();
		})
		.then((resumeItems) => {
			const firstItem = resumeItems[0];
			if (!firstItem) {
				return;
			}

			firstResumeRow.replaceChildren(
				...[firstItem.rYearRange, firstItem.rTitle, firstItem.rWhere].map((value) => {
					const cell = document.createElement("td");
					cell.textContent = value;
					return cell;
				}),
			);
		})
		.catch((error) => console.error(error));
});
