let nav: Element = document.querySelector('body header nav');
nav.appendChild(sumario('.teoria .slide', 'nav-teoria'));
nav.appendChild(sumario('.atividades .slide', 'nav-atividades'));
let hash: string = location.hash;
if (hash.split('-')[0]!='#a') {
    document.querySelector('#nav-atividades').classList.add('fechado');
} else if (hash.split('-')[0]=='#a') {
    document.querySelector('#nav-teoria').classList.add('fechado');
}

function sumario(query: string, id: string): HTMLOListElement {
    let secao: HTMLOListElement = document.createElement("ol");
    secao.id = id;
    let slideList: NodeList = document.querySelectorAll(query);
    for (let i = 0; i < slideList.length; i++) {
        let li: HTMLLIElement = document.createElement("li");
        let a: HTMLAnchorElement = document.createElement("a");
        let slide: Element = slideList[i] as Element;
        let titulo: HTMLHeadingElement = slide.querySelector("h1");
        slide.id = "t-" + i;
        a.href = "#" + slide.id;
        a.textContent = titulo.textContent;
        li.appendChild(a);
        secao.appendChild(li);
    }
    return secao;
}

function tocarAudio(event: Event, audioId: string): void {
    let audioEl: HTMLAudioElement = <HTMLAudioElement>document.getElementById(audioId);
    if (!audioEl.paused) {
        audioEl.pause();
        audioEl.currentTime = 0;
    }
    else audioEl.play();
    event.preventDefault();
}