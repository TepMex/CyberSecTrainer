document.addEventListener("DOMContentLoaded", init)

let state = {
    timeEl: null,
    startBtn: null,
    passwordInput: null,
    
    dictSettings: {
        numbers: true,
        latinCharLow: false,
        latinCharUpp: false,
        specialSymbols: false,
    }
}

function init()
{
    state.timeEl = document.querySelector("#brute-time")
    state.startBtn = document.querySelector("#start-btn")
    state.passwordInput = document.querySelector("#password")
    
    state.startBtn.addEventListener("click", onStartBtn)
    state.passwordInput.addEventListener("input", onPasswordInput)
    
}

function onPasswordInput(e)
{
    state.dictSettings = setDictSettings(state.passwordInput.value)
    setDictCheckboxes(state.dictSettings)
}

function setDictCheckboxes(settings)
{
    for(let k of Object.keys(settings))
    {
        document.querySelector(`[dict-type=${k}]`).checked = settings[k]
    }
}

function setDictSettings(pwd)
{
    return {
        numbers: /[0-9]/.test(pwd),
        latinCharLow: /[a-z]/.test(pwd),
        latinCharUpp: /[A-Z]/.test(pwd),
        specialSymbols: /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pwd)
    }
}

function onStartBtn(e)
{
    let pwd = state.passwordInput.value
    dict = createDict(state.dictSettings)
    let time = brutePwd(pwd, dict)
    
    state.timeEl.textContent = time.toString()
}


function brutePwd(pwd, dict)
{

	// to service worker
	let startTime = Date.now()

	for(let sym1 of dict)
	{
		for(let sym2 of dict)
		{
			for(let sym3 of dict)
			{
				for(let sym4 of dict)
				{
					if(sym1+sym2+sym3+sym4 === pwd)
					{
						break;
					}
				}
			}
		}
	}

	let endTime = Date.now()

	return (endTime-startTime)/1000

}

function createDict(dictSettings)
{
	let dict = ""

	if(dictSettings.numbers)
	{
		dict += "0123456789"
	}

	if(dictSettings.latinCharLow)
	{
		dict += "abcdefghijklmnopqrstuvwxyz"
	}

	if(dictSettings.latinCharUpp)
	{
		dict += "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
	}

	if(dictSettings.specialSymbols)
	{
		dict += "!@#$%^&*()_+~,<>?./\\[]:\"' "
	}

	return dict
	
}



