// Animation header

var header = document.getElementById('header');
window.addEventListener('scroll', function (e) {
	//console.log(window);
	if (e.currentTarget.scrollY >= 250) {
		header.style.transition = 'top .6s';
		header.style.top = '-100px';
	}
	else if (e.currentTarget.scrollY < 250) {
		header.style.transition = 'top .6s cubic-bezier(0.4, 0.07, 0.6, 1.29)';
		header.style.top = '-10px';
	}
}, false);

// Fin animation header

//  CGV  //

var cgvpopup = document.getElementById('cgvpopup'),
	popUpCGV = document.getElementById('popUpCGV'),
	overlay = document.getElementById('overlay');

cgvpopup.addEventListener('click', function(e) {
	e.preventDefault();
	overlay.style.visibility = 'visible';
	popUpCGV.style.visibility = 'visible';
	popUpCGV.style.opacity = 1;
	popUpCGV.style.transition = 'opacity .5s;';
}, false);
overlay.addEventListener('click', function (e) {
	popUpCGV.style.visibility = 'hidden';
	popUpCGV.style.opacity = 0;
	e.currentTarget.style.visibility = 'hidden';
}, false);

//  FIN CGV  //

//  MENTIONS LEGALES  //

var popUpML = document.getElementById('popUpML'),
	ML = document.getElementById('ML');

	ML.addEventListener('click', function(e) {
		e.preventDefault();
		overlay.style.visibility = 'visible';
		popUpML.style.visibility = 'visible';
		popUpML.style.opacity = 1;
		popUpML.style.transition = 'opacity .5s;';
	}, false);
	overlay.addEventListener('click', function (e) {
		popUpML.style.visibility = 'hidden';
		popUpML.style.opacity = 0;
		e.currentTarget.style.visibility = 'hidden';
	}, false);


//  FIN MENTIONS LEGALES  //

//  TrashProfil  //

var formTrashProfil = document.getElementById('formTrashProfil');
if (formTrashProfil) {
	var trashProfil = document.getElementById('trashProfil'),
	IDTrashProfil = encodeURIComponent(document.getElementById('IDTrashProfil').value),
	popUpDeleteProfil = document.getElementById('popUpDeleteProfil');
	formTrashProfil.addEventListener('submit', function(e) {
		e.preventDefault();
		overlay.style.visibility = 'visible';
		popUpDeleteProfil.style.visibility = 'visible';
		popUpDeleteProfil.style.opacity = 1;
		popUpDeleteProfil.style.top = '50%';
		popUpDeleteProfil.style.marginTop = '-150px';
		var btnNON = document.getElementById('btnNON'),
			btnOUI = document.getElementById('btnOUI');
			btnNON.addEventListener('click', function (e) {
				popUpDeleteProfil.style.visibility = 'hidden';
				popUpDeleteProfil.style.opacity = 0;
				popUpDeleteProfil.style.top = 0;
				overlay.style.visibility = 'hidden';
			}, false);
			btnOUI.addEventListener('click', function (e) {
				xhr = new XMLHttpRequest();
				xhr.open('POST', '/game_zone/controleurs/trash-profil-json-script.php', true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.send('id_membre=' + IDTrashProfil);
				xhr.addEventListener('readystatechange', function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						var reponseObjet = JSON.parse(xhr.responseText);
						document.location.href= "/game_zone/accueil";
					}
					else {
						console.log(xhr);
					}
				}, false);
			}, false);
		overlay.addEventListener('click', function (e) {
			popUpDeleteProfil.style.visibility = 'hidden';
			popUpDeleteProfil.style.opacity = 0;
			popUpDeleteProfil.style.top = 0;
			e.currentTarget.style.visibility = 'hidden';
		}, false);
	}, false);
}

//  Fin TrashProfil  //


var inputsRequired = document.querySelectorAll('input[required]:not([type="file"]), textarea[required]:not([type="file"])'),
    inputsRequiredLength = inputsRequired.length;
if (inputsRequired) {
    for (var i = 0; i < inputsRequiredLength; i++) {
        inputsRequired[i].addEventListener('blur', function (e) {
            if (!e.currentTarget.value) {
                e.currentTarget.style.border = '1px solid red';
            }
        }, false);
        inputsRequired[i].addEventListener('focus', function (e) {
            if (e.currentTarget.style.border == '1px solid red') {
                e.currentTarget.style.border = '1px solid #0085B2';
            }
        }, false);
    }
}

var selectRequired = document.querySelectorAll('select[required]'),
    selectRequiredLength = selectRequired.length;
if (selectRequired) {
    for (var i = 0; i < selectRequiredLength; i++) {
        selectRequired[i].addEventListener('change', function (e) {
            if (e.currentTarget.options[e.currentTarget.selectedIndex].innerHTML == 'Sélectionnez la catégorie') {
                e.currentTarget.parentNode.nextElementSibling.textContent = 'Vous devez sélectionner une catégorie';
                e.currentTarget.style.border = '1px solid red';
            }
            else if (e.currentTarget.options[e.currentTarget.selectedIndex].innerHTML == 'Sélectionnez le rayon') {
                e.currentTarget.parentNode.nextElementSibling.textContent = 'Vous devez sélectionner un rayon';
                e.currentTarget.style.border = '1px solid red';
            }
            else {
                e.currentTarget.parentNode.nextElementSibling.textContent = '';
                e.currentTarget.style.border = '1px solid transparent';
            }
        }, false);
        selectRequired[i].addEventListener('blur', function (e) {
            if (e.currentTarget.options[e.currentTarget.selectedIndex].innerHTML == 'Sélectionnez la catégorie') {
                e.currentTarget.parentNode.nextElementSibling.textContent = 'Vous devez sélectionner une catégorie';
                e.currentTarget.style.border = '1px solid red';
            }
            else if (e.currentTarget.options[e.currentTarget.selectedIndex].innerHTML == 'Sélectionnez le rayon') {
                e.currentTarget.parentNode.nextElementSibling.textContent = 'Vous devez sélectionner un rayon';
                e.currentTarget.style.border = '1px solid red';
            }
            else {
                e.currentTarget.parentNode.nextElementSibling.textContent = '';
                e.currentTarget.style.border = '1px solid transparent';
            }
        }, false);
    }
}

var inputFile = document.getElementById('image1');
if (inputFile) {
    inputFile.addEventListener('change', function () {
        console.log(inputFile.files);
    }, false);
}

// Partie qui gère les images de chaque produit

var overlay = document.getElementById('overlay'),
    popUpImage = document.getElementById('popUpImage'),
	popUpPanier = document.getElementById('popUpPanier'),
    imgPop = document.getElementById('imgPop'),
	imgPopUp = document.getElementById('imgPopUp'),
    imgSlider = document.querySelectorAll('.imgSlider'),
    imgSliderLength = imgSlider.length,
    containerClose = document.getElementById('containerClose'),
    cross = document.getElementById('cross'),
    leftArrow = document.getElementById('leftArrow'),
    rightArrow = document.getElementById('rightArrow'),
    imgBackgrd = document.getElementById('imgBackgrd');
if (imgBackgrd) {
    imgBackgrd.addEventListener('click', function () {
        var styleImgBack = imgBackgrd.style.backgroundImage;
        overlay.style.visibility = 'visible';
        popUpImage.style.visibility = 'visible';
        popUpImage.style.opacity = 1;
        popUpImage.style.top = '50%';
        popUpImage.style.marginTop = '-251px';
        popUpImage.style.backgroundImage = styleImgBack;
        //popUpImage.style.backgroundRepeat = 'no-repeat';
        //popUpImage.style.backgroundPosition = '50%';
    }, false);
    overlay.addEventListener('click', function (e) {
        popUpImage.style.visibility = 'hidden';
        popUpImage.style.top = 0;
        popUpImage.style.opacity = 0;
		popUpPanier.style.visibility = 'hidden';
        popUpPanier.style.top = 0;
        popUpPanier.style.opacity = 0;
        e.currentTarget.style.visibility = 'hidden';
    }, false);
        containerClose.addEventListener('click', function () {
        popUpImage.style.visibility = 'hidden';
        popUpImage.style.top = 0;
        popUpImage.style.opacity = 0;
        overlay.style.visibility = 'hidden';
    }, false);
    if (rightArrow && leftArrow) {
        rightArrow.addEventListener('click', function () {
            for (var i = 0; i < imgSliderLength; i++) {
				//alert('Le background de imgSlider : ' + imgSlider[i].style.backgroundImage);
				//alert('Le background de popUpImage : ' + popUpImage.style.backgroundImage);
                if (imgSlider[i].style.backgroundImage == popUpImage.style.backgroundImage) {
					//alert(popUpImage.style.backgroundImage);
                    if (imgSlider[i].nextElementSibling.classList.contains('imgSlider')) {
                        var newBackgrd = imgSlider[i].nextElementSibling.style.backgroundImage;
						//alert('newBackGrd est égal à : ' + newBackgrd);
						popUpImage.style.backgroundImage = newBackgrd;
                        break;
                    }
                    else {
						//alert('Aie');
                        popUpImage.style.backgroundImage = imgSlider[i].parentNode.firstElementChild.nextElementSibling.style.backgroundImage;
                        break;
                    }
                }
            }
        }, false);
        leftArrow.addEventListener('click', function () {
            for (var i = 0; i < imgSliderLength; i++) {
                if (imgSlider[i].style.backgroundImage == popUpImage.style.backgroundImage) {
                    //console.log(imgSlider[i].previousElementSibling);
                    if (imgSlider[i].previousElementSibling.classList.contains('imgSlider')) {
                        var newBackgrd2 = imgSlider[i].previousElementSibling.style.backgroundImage;
                        popUpImage.style.backgroundImage = newBackgrd2;
                        break;
                    }
                    else {
                        popUpImage.style.backgroundImage = imgSlider[i].parentNode.lastElementChild.previousElementSibling.style.backgroundImage;
                        break;
                    }
                }
            }
        }, false);
    }
    for (var i = 0; i < imgSliderLength; i++) {
        imgSlider[i].addEventListener('click', function (e) {
            var styleImg = e.currentTarget.style.backgroundImage;
                imgBackgrd.style.backgroundImage = styleImg;
            for (var id in imgSlider) {
                if (e.currentTarget.className == imgSlider[id].className) {
                    imgSlider[id].style.border = '1px solid #0085b2';
                    imgSlider[id].style.boxShadow = '0 0 .3em #3d3d3d';
                } else {
                    imgSlider[id].style.border = '1px solid transparent';
                    imgSlider[id].style.boxShadow = '0 0 .05em .035em #c2c2c2';
                }
            }
        }, false);
    }
}

// Fin de la gestion des images de chaque produit

// Gestion ajout panier depuis page products

var formAddChart = document.getElementById('formAddChart');

if (formAddChart) {
    formAddChart.addEventListener('submit', function (e) {
        e.preventDefault();
		var id_article = encodeURIComponent(document.getElementById('id_article').value),
			nom = encodeURIComponent(document.getElementById('nom').value),
			marque = encodeURIComponent(document.getElementById('marque').value),
			image_1 = encodeURIComponent(document.getElementById('image_1').value),
			prix = encodeURIComponent(document.getElementById('prix').value),
			url = encodeURIComponent(document.getElementById('url').value),
			submit = encodeURIComponent(document.getElementById('submit').value),
			xhr = new XMLHttpRequest();
			xhr.open('POST', '/game_zone/controleurs/product-json-script.php', true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send('id_article=' + id_article + '&nom=' + nom + '&marque=' + marque + '&image_1=' + image_1 + '&prix=' + prix + '&url=' + url + '&submit=' + submit);
			xhr.addEventListener('readystatechange', function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var reponseObjet = JSON.parse(xhr.responseText);
					console.log(reponseObjet);
					var numPanier = document.getElementById('numPanier');
					overlay.style.visibility = 'visible';
					popUpPanier.style.visibility = 'visible';
					popUpPanier.style.opacity = 1;
					popUpPanier.style.top = '50%';
					popUpPanier.style.marginTop = '-125px';
					var parseNumPanier = parseInt(numPanier.innerHTML);
					parseNumPanier += reponseObjet.quantite;
					numPanier.innerHTML = parseNumPanier;
					var nomProduct = document.getElementById('nomProduct'),
						marqueProduct = document.getElementById('marqueProduct'),
						imageProduct = document.getElementById('imageProduct'),
						btnPanier = document.getElementById('btnPanier'),
						btnGo = document.getElementById('btnGo');
					nomProduct.innerHTML = reponseObjet.nom;
					marqueProduct.innerHTML = reponseObjet.marque;
					imageProduct.style.background = 'url("' + reponseObjet.image_1 + '") no-repeat center 50% / 75%';
					btnPanier.href = '/game_zone/panier';
					btnGo.addEventListener('click', function () {
						popUpPanier.style.visibility = 'hidden';
						popUpPanier.style.top = 0;
						popUpPanier.style.opacity = 0;
						overlay.style.visibility = 'hidden';
					}, false);
				}
				else {
					console.log(xhr);
				}
			}, false);

    }, false);
}

// Fin gestion ajout panier depuis page product

// Gestion paiement final du panier

var formChartPayment = document.getElementById('formChartPayment');

if (formChartPayment) {
    formChartPayment.addEventListener('submit', function (e) {
        e.preventDefault();
            submit = encodeURIComponent(document.getElementById('submitPayment').value),
            xhr = new XMLHttpRequest();
            var cgv = document.getElementById('cgv'),
                cgvState = encodeURIComponent(cgv.checked);
            cgv.addEventListener ('change', function (e) {
                cgvState = encodeURIComponent(e.currentTarget.checked);
            }, false);
			xhr.open('POST', '/game_zone/controleurs/payment-json-script.php', true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send('cgvState=' + cgvState + '&submit=' +  submit);
			xhr.addEventListener('readystatechange', function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var reponseObjet = JSON.parse(xhr.responseText);
					console.log(reponseObjet);
                    errorMsgCGV = document.getElementById('errorMsgCGV');
                    var countPanier = document.getElementById('countPanier').value;
                    if (reponseObjet.message_cgv) {
                        errorMsgCGV.innerHTML = reponseObjet.message_cgv;
                    }
                    else {
                        errorMsgCGV.innerHTML = '';
                    }
                    for (var i = 0; i < countPanier; i++) {
                        for(var id in reponseObjet)
                        {
                            if (id == 'message_' + i) {
                                errorMsgCGV.innerHTML = reponseObjet[id];
                            }
                            else {
                                errorMsgCGV.innerHTML += '';
                            }
                            if (id == 'msg_transaction_terminee') {
                                //alert(reponseObjet[id]);
                                var parseNumPanier = parseInt(numPanier.innerHTML);
            					parseNumPanier = 0;
            					numPanier.innerHTML = parseNumPanier;
                                var popUpPanierPayment = document.getElementById('popUpPanierPayment'),
                                paymentH2Span = document.querySelector('#popUpPanierPayment h2 span'),
                                paymentH3 = document.querySelector('#popUpPanierPayment h3'),
                                paymentH5Span = document.querySelector('#popUpPanierPayment h5 span'),
                                parsePaymentH5Span = parseInt(paymentH5Span.innerHTML);
                                var intervalID;
                				function decrementeH5Span() {
                				    intervalID = setInterval(changeNum, 1000);
                				}
                				function changeNum() {
                					if (parsePaymentH5Span != 0) {
                						parsePaymentH5Span -= 1;
                						paymentH5Span.innerHTML = parsePaymentH5Span;
                					}
                				}
                				decrementeH5Span();
                                paymentH2Span.innerHTML = reponseObjet.num_commande;
                                paymentH3.innerHTML = reponseObjet.msg_transaction_terminee;
                                overlay.style.visibility = 'visible';
                                popUpPanierPayment.style.visibility = 'visible';
            					popUpPanierPayment.style.opacity = 1;
            					popUpPanierPayment.style.top = '50%';
            					popUpPanierPayment.style.marginTop = '-125px';
                                overlay.addEventListener('click', function () {
                                    document.location.href= "/game_zone/panier";
                                }, false);
                                setTimeout(function() {
                                    document.location.href= "/game_zone/panier";
                                }, 10000);
                            }
                            else {
                                var parseNumPanier = parseInt(reponseObjet.quantite_totale_panier);
            					numPanier.innerHTML = parseNumPanier;
                            }
                        }
                    }
				}
				else {
					console.log(xhr);
				}
			}, false);
    }, false);
}

// Fin gestion paiement final du panier

// Gestion des membres

var formTrashUser = document.querySelectorAll('.formTrashUser'),
    formTrashUserLength = formTrashUser.length;
    if (formTrashUser) {
        for (var i = 0; i < formTrashUserLength; i++) {
            formTrashUser[i].addEventListener('submit', function (e) {
                e.preventDefault();
                var inputIdMembre = e.currentTarget.firstElementChild,
                    inputVal = encodeURIComponent(inputIdMembre.value);
                if (confirm('Voulez-vous vraiment supprimer l\'utilisateur portant l\'identifiant ' + inputVal + ' ?')) {
                xhr = new XMLHttpRequest();
                xhr.open('POST', '/game_zone/admin/controleurs/trashuser-json-script.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('id_membre=' + inputVal);
                xhr.addEventListener('readystatechange', function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var reponseObjet = JSON.parse(xhr.responseText),
                            Td = inputIdMembre.parentNode.parentNode,
                            Tr = Td.parentNode,
                            TbSection = Tr.parentNode;
                            TbSection.removeChild(Tr);
                    }
                    else {
                    	console.log(xhr);
                    }
                    }, false);
                }
            }, false);
        }
    }

/*  FIN GESTION DES MEMBRES  */

/* GESTION DES ARTICLES */

var formTrashProduct = document.querySelectorAll('.formTrashProduct'),
    formTrashProductLength = formTrashProduct.length;
    if (formTrashProduct) {
        for (var i = 0; i < formTrashProductLength; i++) {
            formTrashProduct[i].addEventListener('submit', function (e) {
                e.preventDefault();
                var inputIdArticle = e.currentTarget.firstElementChild,
                    inputVal = encodeURIComponent(inputIdArticle.value);
                if (confirm('Voulez-vous vraiment supprimer l\'article portant l\'identifiant ' + inputVal + ' ?')) {
                xhr = new XMLHttpRequest();
                xhr.open('POST', '/game_zone/admin/controleurs/trashproduct-json-script.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('id_article=' + inputVal);
                xhr.addEventListener('readystatechange', function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var reponseObjet = JSON.parse(xhr.responseText),
                            Td = inputIdArticle.parentNode.parentNode,
                            Tr = Td.parentNode,
                            TbSection = Tr.parentNode;
                            TbSection.removeChild(Tr);
                    }
                    else {
                    	console.log(xhr);
                    }
                    }, false);
                }
            }, false);
        }
    }

/* FIN GESTION DES ARTICLES */

/* GESTION DES COMMENTAIRES */

var formTrashComment = document.querySelectorAll('.formTrashComment'),
    formTrashCommentLength = formTrashComment.length;
    if (formTrashComment) {
        for (var i = 0; i < formTrashCommentLength; i++) {
            formTrashComment[i].addEventListener('submit', function (e) {
                e.preventDefault();
                var inputIdComment = e.currentTarget.firstElementChild,
                    inputVal = encodeURIComponent(inputIdComment.value);
                if (confirm('Voulez-vous vraiment supprimer le commentaire portant l\'identifiant ' + inputVal + ' ?')) {
                xhr = new XMLHttpRequest();
                xhr.open('POST', '/game_zone/admin/controleurs/trashcomment-json-script.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('id_avis=' + inputVal);
                xhr.addEventListener('readystatechange', function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var reponseObjet = JSON.parse(xhr.responseText),
                            Td = inputIdComment.parentNode.parentNode,
                            Tr = Td.parentNode,
                            TbSection = Tr.parentNode;
                            TbSection.removeChild(Tr);
                    }
                    else {
                    	console.log(xhr);
                    }
                    }, false);
                }
            }, false);
        }
    }

/* FIN GESTION DES COMMENTAIRES */

/* GESTION RECHERCHE */

var searchForm = document.getElementById('searchForm'),
    searchInput = document.getElementById('searchInput'),
    searchSubmit = document.getElementById('searchSubmit'),
    searchResults = document.getElementById('searchResults'),
    tableResults = document.getElementById('tableResults');

    searchForm.addEventListener('submit', function (e) {
        if (searchInput.value < 1) {
            e.preventDefault();
        }
    }, false);

    searchInput.addEventListener('keyup', function (e) {
        if (e.currentTarget.value.length > 1) {
            xhr = new XMLHttpRequest();
            xhr.open('POST', '/game_zone/admin/controleurs/search-json-script.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send('search=' + encodeURIComponent(e.currentTarget.value));
            xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    var reponseObjet = JSON.parse(xhr.responseText);
                    searchResults.style.visibility = 'visible';
                    searchResults.style.opacity = 1;
                    searchResults.style.display = 'block';
                    var tabTr = document.querySelectorAll('tr.ligne');
                    if (tabTr) {
                        for (var i = 0; i < tabTr.length; i++) {
                            tabTr[i].parentNode.removeChild(tabTr[i]);
                        }
                    }
                    for (var i = 0; i < reponseObjet.length; i++) {
                        var tr = document.createElement('tr');
                        tr.className = 'ligne ligne_' + i;
                        tableResults.appendChild(tr);
                    }
                    var i = 0;
                    for (var id in reponseObjet) {
                        var trnum = document.querySelector('.ligne_' + i);
                        trnum.innerHTML = '<input type="hidden" value="' + reponseObjet[id].categorie_nom + '" /><input type="hidden" value="' + reponseObjet[id].sous_categorie_nom + '" /><input type="hidden" value="' + reponseObjet[id].id_article + '" /><input type="hidden" value="' + reponseObjet[id].article_nom + '" /><td class="tdSearch" style="background: url(\'' + reponseObjet[id].image_1 + '\') no-repeat center 50% / 55%;padding-left: 42px;"></td><td class="tdSearch">' + reponseObjet[id].article_nom + '</td><td class="tdSearch" style="font-size: .7em;">' + reponseObjet[id].categorie_nom.replace(/x$|s$/g, '') + '</td><td class="tdSearch" style="font-size: .65em;">' + reponseObjet[id].marque + '</td>';
                        i++;
                    }
                    if (reponseObjet == '') {
                        tableResults.innerHTML = '';
                        searchResults.style.visibility = 'hidden';
                        searchResults.style.opacity = 0;
                        searchResults.style.display = 'none';
                    }
                    document.addEventListener('click', function (e) {
                            if (e.target == searchInput) {
                                searchResults.style.visibility = 'visible';
                                searchResults.style.opacity = 1;
                            }
                            else if (e.target.className != 'tdSearch') {
                                tableResults.innerHTML = '';
                                searchResults.style.visibility = 'hidden';
                                searchResults.style.opacity = 0;
                                searchResults.style.display = 'none';
                            }
                            else {
                                var categorie = e.target.parentNode.firstElementChild.value.replace(/é/g, 'e').replace(/ |'/g, '-').toLowerCase(),
                                    sousCategorie = e.target.parentNode.firstElementChild.nextElementSibling.value.replace(/é/g, 'e').replace(/ |'/g, '-').toLowerCase(),
                                    idArticle = e.target.parentNode.firstElementChild.nextElementSibling.nextElementSibling.value,
                                    nomArticle = e.target.parentNode.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.value.replace(/é/g, 'e').replace(/ |'/g, '-').toLowerCase();
                                var redirect = '/game_zone/' + categorie + '/' + sousCategorie + '/' + idArticle + '-' + nomArticle;
                                document.location.href = redirect;
                            }
                    }, false);
                }
                else {
                    console.log(xhr);
                }
            }, true);
        }
        else {
            tableResults.innerHTML = '';
            searchResults.style.visibility = 'hidden';
            searchResults.style.opacity = 0;
            searchResults.style.display = 'none';
        }
    }, false);

/* FIN GESTION RECHERCHE */

//
//
//
