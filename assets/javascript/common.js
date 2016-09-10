$(document).ready(function(){
    var action = false;
    

    /* ==========================================================================
        PLACEHOLDER SUPPORT
       ========================================================================== */
    
    // Ajoute la fonctionnalité placeholder des formulaires pour les navigateurs ne le supportant pas
    if ( !Modernizr.input.placeholder ) {
        $('input').placeholder();
    }


    /* ==========================================================================
        MENU
       ========================================================================== */

    // Ajout d'une classe sur le boutton du menu correspondant à la page courante
    if( typeof( menu_active ) != 'undefined' ) {
        $( menu_active ).addClass('on');
    }

    var method_menu_mobile = '';
    $('#control-menu-mobile').on('click', function() {
        method_menu_mobile = ($(this).hasClass('on')) ? 'slideUp' : 'slideDown';
        $('#header-menu').velocity(method_menu_mobile, { duration: 500 })
        $(this).toggleClass('on');
    });
    
    $('#control-lang').on('click', 'a', function() {
        $(this).toggleClass('on');
    });


    /* ==========================================================================
       FitVids - MAKE RESPONSIVE VIDEO
       ========================================================================== */

    $("#main").fitVids();


    /* ==========================================================================
        ADDITIONNAL EVENT BOX & FORM
       ========================================================================== */

    // Ferme le div parent lors d'un clique sur un bouton possédant la classe 'close'
    $('.close').on('click', function()
    {
        $(this).parent().fadeOut();
    });

    // Evite qu'un formulaire soit soumis plusieurs fois et ajoute une classe 'on' sur le boutton submit
    $('form').submit(function()
    {
        if(action===false)
        {
            action = true;
            $(this).addClass('on');
        }
        else
        {
            return false;
        }
    });


    /* ==========================================================================
        GMAPS
       ========================================================================== */
    
    // Instanciation de la carte
    var map = new GMaps({
        scrollwheel: false,
        draggable: false,
        div: '#gmaps',
        lat: 48.5680081,
        lng: 7.7551335
    });

    // Ajout d'un marqueur
    var marker = map.addMarker({
        lat: 48.566542,
        lng: 7.7551067,
        title: 'Salle de AKSVB à l\'école du Neufeld',
        infoWindow: {
            content: '<div class="info" style="width:200px;"><div class="aksvb-logo-min-r"></div><p class="font-bold">Ecole du Neufeld</p><p>1, rue de Sundgau<br>67000 Strasbourg</p><a target="_blank" href="https://www.google.fr/maps/place/Ecole+du+Neufeld/@48.5658764,7.7566517,16z/data=!4m2!3m1!1s0x0:0xabba55e97668c48">Voir le plan complet</a></div>',
            maxWidth: 250
        }
    });

    // Ouvre le marqueur au chargement de la page
    marker.infoWindow.open(marker.map, marker);


    /* ==========================================================================
       Smooth Scrolling Anchor
       ========================================================================== */

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').velocity(
                        'scroll', 
                        {offset: target.offset().top, duration: 1000}
                    );
                return false;
            }
        }
    });


    /* ==========================================================================
        EVENTS
       ========================================================================== */

    var method_slide_event = '';
    var c_event = null;
    $('#events li:not(.empty)').on('click', function() {
        c_event = $(this);
        method_slide_event = (c_event.hasClass('on')) ? 'slideUp' : 'slideDown';
        c_event.children('.content').velocity(method_slide_event, { duration: 500 });
        c_event.toggleClass('on');
    });
});


window.onload = function() 
{
    /* ==========================================================================
       Slideshow
       ========================================================================== */

    if($('#slideshow').length)
    {
        $('#slideshow').bxSlider({auto:true, pause:6500});
    }


    /* ==========================================================================
       VERTICALLY CENTER FLOATING DIV
       ========================================================================== */

    var current_height = 0;
    var current_width  = 0;
    var brother_height = 0;

    $( window ).resize(function() {
        parse_center_div_float();
    });

    parse_center_div_float();
    
    function parse_center_div_float()
    {
        $('.grid-center-l').each(function(){ center_div_float($(this), $(this).next()); });
        $('.grid-center-r').each(function(){ center_div_float($(this), $(this).prev()); });
    }
    
    function center_div_float(current, brother)
    {
        current_width = parseFloat(current.css('width')) + parseFloat(current.css('padding-left')) + parseFloat(current.css('padding-right'));
        parent_width = parseFloat(current.parent().css('width')) + parseFloat(current.parent().css('padding-left')) + parseFloat(current.parent().css('padding-right'));
        if(1 > (current_width / parseFloat(current.parent().css('width'))) )
        {
            current_height = current.outerHeight();
            brother_height = brother.outerHeight();

            if(current_height < brother_height)
            {
                current.css('margin-top', ((brother_height - current_height) / 2) +'px' );
            }
            else
            {
                current.css('margin-top', 0);
            }
        }
        else
        {
            current.css('margin-top', 0);
        }
    }

    /* ==========================================================================
       Random texts (link to top & Proverbs)
       ========================================================================== */
    var rand_w   = Math.floor( ( Math.random() * 16 ) + 1 ),
        rand_p   = Math.floor( ( Math.random() * 19 ) + 1 );
        words    = ["Persévérance", "Détermination", "Souplesse", "Fluidité", "Justesse", "Humilité", "Fraternité", "Stabilité", "Esprit", "Sagesse", "Trois Pensées", "Evolution", "Voie", "L'arc et la flèche", "Le Cavalier", "Le Tigre"],
        proverbs = ["Aussi rapide que le vent, silencieux comme la forêt, aussi audacieux que le feu, immobile comme la montagne", "Ne crains pas l’homme qui a pratiqué 10.000 coups une seule fois, mais crains l’homme qui a pratiqué un coup 10.000 fois", "La réalité devient rapidement visible lorsque l'on cesse de comparer. Tout ce 'qui est' se révèle seulement quand il n'y a aucune comparaison, et vivre simplement avec ce qui existe en tant que tel, vous permet d'être paisible", "L'arbre le plus robuste cède facilement lorsque le bambou ou le saule survit en pliant sous le vent", "Ne crains pas d'avancer lentement, Crains seulement de t'arrêter", "Ce qui est appris en une journée doit être répété toute une vie", "Celui qui sait ne parle pas Celui qui parle ne sait pas", "Un chemin de mille lieues Commence toujours par un premier pas", "Pour tous ceux dont la progression reste entravée par des distractions liées à l'ego, laissez l'humilité – la pierre angulaire spirituelle sur laquelle repose l'art martial – vous rappeler de placer la vertu avant le vice, les valeurs avant la vanité et les principes avant les personnalités", "Le but ultime de l'art martial ne réside pas dans la victoire ou la défaite, mais dans la perfection du caractère de celui qui le pratique", "Entre voir et regarder, voir est plus important que regarder. L'essentiel dans la tactique est de voir ce qui est éloigné comme si c'était proche et de de voir ce qui est proche comme si c'était éloigné", "Ne frappe pas pour gagner, frappe après avoir gagné", "L'archer a un point commun avec l'homme de bien : quand sa flèche n'atteint pas le centre de la cible, il en cherche la cause en lui-même", "L'homme supérieur c'est celui qui d'abord met ses paroles en pratique, et ensuite parle conformément à ses actions", "De celui qui dans la bataille a vaincu mille milliers d'hommes et de celui qui s'est vaincu lui même, c'est ce dernier qui est le plus grand vainqueur", "Passez auprès de toutes les choses sans y accorder aucune intention, comme s'il n'existait au monde qu'une chose importante... La perfection du geste dans la souplesse", "La chose la plus molle au monde se précipite sur la chose la plus dur au monde. Rien au monde n'est plus mou ni faible que l'eau; mais lorsqu'elle se jette sur ce qui est fort et dur, rien ne peut la combattre", "L'efficacité ne s'apprécie guère par l'art martial en lui-même, mais par la qualité même du pratiquant. Tous les arts ont une finalité d'efficacité, c'est le pratiquant qui est, à la base, inefficace", "Arbre renversé par le vent avait plus de branches que de racines"],
        authors = ["Anonyme", "Bruce Lee", "Bruce Lee", "Bruce Lee", "Proverbe chinois", "Me Kase", "Lao Tseu", "Lao Tseu", "Sokon 'Bushi' Matsumura", "Gichin Funakoshi", "Miyamoto Musashi", "Myamoto Musashi", "Confucius", "Confucius", "Bouddha", "Kenzo Awa", "Lao Tseu", "Gichin Funakoshi", "Proverbe chinois"];

    // set Link to top
    $("p#triangle-mot").text( words[ rand_w ] )
    // set proverb & author
    $("p.proverb").text( proverbs[ rand_p ] );
    $("p.author").text( authors[ rand_p ] );
}
