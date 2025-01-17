async function fetchData() {
  try {
    const response = await fetch("data0.txt");
    const data = await response.text();

    var outputDiv = document.getElementById("output");
    let guardStartPosition = { col: null, row: null };
    var lines = data.split("\n");
    for (let index = 0; index < lines.length; index++) {
      let line = document.createElement("div");
      line.id = index;
      line.className = "line";
      lines[index]
        .trim()
        .split("")
        .map((letter, id) => {
          if (
            letter === "v" ||
            letter === "^" ||
            letter === ">" ||
            letter === "<"
          ) {
            guardStartPosition.col = index;
            guardStartPosition.row = id;
          }
          let element = document.createElement("div");
          element.textContent = letter;
          element.id = id;
          element.className = "element";
          line.appendChild(element);
        });
      outputDiv.appendChild(line);
    }

    let dataHtml = document.querySelector("#output");
    let positions_will_guard_visit = [guardStartPosition];
    let mapElements = [];

    for (let col = 0; col < dataHtml.children.length; col++) {
      const line = dataHtml.children[col];
      mapElements[col] = [];
      for (let row = 0; row < line.children.length; row++) {
        mapElements[col][row] = line.children[row];
      }
    }

    let nextGuardPosition = move(mapElements, guardStartPosition);
    while (nextGuardPosition !== undefined) {
      guardStartPosition = nextGuardPosition;
      nextGuardPosition = move(mapElements, guardStartPosition);
      await delay(1000);
    }
    let answer = document.querySelector("#answer");
    answer.textContent = countChildrensWithClass("current", mapElements);
  } catch (error) {
    console.error("Error fetching data:", error);
  }
}
function delay(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}
function countChildrensWithClass(elementClass, mapElements) {
  let count = 0;
  mapElements.map((line) => {
    line.map((element) => {
      if (element.classList.contains(elementClass)) {
        count++;
      }
    });
  });
  return count;
}

function move(mapElements, guardStartPosition) {
  let guard = mapElements[guardStartPosition.col][guardStartPosition.row];
  guard.classList.add("current");
  let col = guardStartPosition.col;
  let row = guardStartPosition.row;
  let nextElement = mapElements[col][row];

  let direction = guard.textContent;
  let changeGuardDirection;
  if (direction === "^") {
    changeGuardDirection = ">";
  } else if (direction === "v") {
    changeGuardDirection = "<";
  } else if (direction === ">") {
    changeGuardDirection = "v";
  } else if (direction === "<") {
    changeGuardDirection = "^";
  }

  let moveDelta = { col: 0, row: 0 };
  if (direction === "^") {
    moveDelta.col = -1;
  } else if (direction === "v") {
    moveDelta.col = 1;
  } else if (direction === ">") {
    moveDelta.row = 1;
  } else if (direction === "<") {
    moveDelta.row = -1;
  }
  while (nextElement !== undefined && nextElement.textContent !== "#") {
    nextElement.classList.add("current");
    // nextElement.textContent = direction;
    col += moveDelta.col;
    row += moveDelta.row;
    nextElement = mapElements[col] && mapElements[col][row];
  }

  if (nextElement === undefined) {
    return undefined;
  }

  col -= moveDelta.col;
  row -= moveDelta.row;
  nextElement = mapElements[col][row];
  nextElement.textContent = changeGuardDirection;
  return { col: col, row: row };
}

fetchData();
