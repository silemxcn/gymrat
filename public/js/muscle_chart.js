function showfemale(){
    $('.popover').popover('hide');
    $("#malefigures").css("display", "none");
    $("#femalefigures").css("display", "block");
}
function showmale(){
    $('.popover').popover('hide');
    $("#malefigures").css("display", "block");
    $("#femalefigures").css("display", "none");
}
$(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover"].pecs').attr('data-original-title','Pectoralis');
    $('[data-toggle="popover"].pecs').attr('data-content','There are two such muscles on each side of the sternum (breastbone) in the human body: pectoralis major and pectoralis minor.\n' +
        '\n' +
        'The pectoralis major, the larger and more superficial, originates at the clavicle (collarbone), the sternum, the ribs, and a tendinous extension of the external oblique abdominal muscle. The pectoralis major extends across the upper part of the chest and is attached to a ridge at the rear of the humerus (the bone of the upper arm). Its major actions are adduction, or depression, of the arm (in opposition to the action of the deltoideus muscle) and rotation of the arm forward about the axis of the body. When the raised arms are fixed (as in mountain climbing), it assists the latissimus dorsi and teres major muscles in pulling the trunk up. The pectoralis minor lies, for the most part, beneath the pectoralis major, arising from the middle ribs and inserting into (attaching to) the scapula (shoulder blade). It aids in drawing the shoulder forward and downward (in opposition to the trapezius muscle). ');

    $('[data-toggle="popover"].traps').attr('data-original-title','Trapezius');
    $('[data-toggle="popover"].traps').attr('data-content','The trapezius is a broad, flat, superficial muscle extending from the cervical to thoracic region on the posterior aspect of the neck and trunk. The muscle is divided into three parts: descending (superior), ascending (inferior), and middle[1]. The muscle contributes to scapulohumeral rhythm through attachments on the clavicle and scapula, and to head balance through muscular control of the cervical spine. ');

    $('[data-toggle="popover"].shoulders').attr('data-original-title','Deltoid');
    $('[data-toggle="popover"].shoulders').attr('data-content','The deltoid muscle is a rounded, triangular muscle located on the uppermost part of the arm and the top of the shoulder. It is named after the Greek letter delta, which is shaped like an equilateral triangle. The deltoid is attached by tendons to the skeleton at the clavicle (collarbone), scapula (shoulder blade), and humerus (upper arm bone). The deltoid is widest at the top of the shoulder and narrows to its apex as it travels down the arm. Contraction of the deltoid muscle results in a wide range of movement of the arm at the shoulder due to its location and the wide separation of its muscle fibers.');

    $('[data-toggle="popover"].biceps').attr('data-original-title','Biceps');
    $('[data-toggle="popover"].biceps').attr('data-content','\n' +
        '\n' +
        'The biceps is a muscle on the front part of the upper arm. The biceps includes a “short head” and a “long head” that work as a single muscle.\n' +
        '\n' +
        'The biceps is attached to the arm bones by tough connective tissues called tendons. The tendons that connect the biceps muscle to the shoulder joint in two places are called the proximal biceps tendons. The tendon that attaches the biceps muscle to the forearm bones (radius and ulna) is called the distal biceps tendon. When the biceps contracts, it pulls the forearm up and rotates it outward.\n');

    $('[data-toggle="popover"].forearm').attr('data-original-title','Forearm');
    $('[data-toggle="popover"].forearm').attr('data-content','The forearm contains many muscles, including the flexors and extensors of the digits, a flexor of the elbow (brachioradialis), and pronators and supinators that turn the hand to face down or upwards, respectively. In cross-section the forearm can be divided into two fascial compartments. The posterior compartment contains the extensors of the hands, which are supplied by the radial nerve. The anterior compartment contains the flexors, and is mainly supplied by the median nerve. The flexor muscles are more massive than the extensors, because they work against gravity and act as anti-gravity muscles. The ulnar nerve also runs the length of the forearm.\n' +
        '\n' +
        'The radial and ulnar arteries and their branches supply the blood to the forearm. These usually run on the anterior face of the radius and ulna down the whole forearm. The main superficial veins of the forearm are the cephalic, median antebrachial and the basilic vein. These veins can be used for cannularisation or venipuncture, although the cubital fossa is a preferred site for getting blood. ');

    $('[data-toggle="popover"].abdominals').attr('data-original-title','Abdominal');
    $('[data-toggle="popover"].abdominals').attr('data-content','Abdominal muscle, any of the muscles of the anterolateral walls of the abdominal cavity, composed of three flat muscular sheets, from without inward: external oblique, internal oblique, and transverse abdominis, supplemented in front on each side of the midline by rectus abdominis. The first three muscle layers extend between the vertebral column behind, the lower ribs above, and the iliac crest and pubis of the hip bone below. Their fibres all merge toward the midline, where they surround the rectus abdominis in a sheath before they meet the fibres from the opposite side at the linea alba. Strength is developed in these rather thin walls by the crisscrossing of fibres. Thus, the fibres of the external oblique are directed downward and forward, those of the internal oblique upward and forward, and those of the transverse horizontally forward.');

    $('[data-toggle="popover"].quads').attr('data-original-title','Quadriceps femoris');
    $('[data-toggle="popover"].quads').attr('data-content','The rectus femoris has its origin on the iliac spine of the hip bone. The other quadriceps muscles have their origins on the femur. The vastus lateralis originates on the lateral surface of the femur, the vastus intermedius on the anterior surface, and the vastus medialis on the medial surface. All four quads insert on the patella (the kneecap) via the quadriceps tendon and on the tibial tuberosity via the patellar ligament. The rectus femoris partially covers the other three quadriceps. The femoral nerve innervates the quads and they get their blood supply via the lateral femoral circumflex artery. The quadriceps all work to extend (straighten) the knee. The rectus femoris also flexes the hip, The vastus medialis adducts the thigh and also extends and externally rotates the thigh and stabilizes the kneecap.');

    $('[data-toggle="popover"].calves').attr('data-original-title','Calf');
    $('[data-toggle="popover"].calves').attr('data-content','The calf muscle, on the back of the lower leg, is actually made up of two muscles:\n' +
        '\n' +
        '    The gastrocnemius is the larger calf muscle, forming the bulge visible beneath the skin. The gastrocnemius has two parts or "heads," which together create its diamond shape.\n' +
        '    The soleus is a smaller, flat muscle that lies underneath the gastrocnemius muscle.\n' +
        '\n' +
        'The gastrocnemius and soleus muscles taper and merge at the base of the calf muscle. Tough connective tissue at the bottom of the calf muscle merges with the Achilles tendon. The Achilles tendon inserts into the heel bone (calcaneus).\n' +
        '\n' +
        'During walking, running, or jumping, the calf muscle pulls the heel up to allow forward movement. ');

    $('[data-toggle="popover"].upper-back').attr('data-original-title','Rhomboid');
    $('[data-toggle="popover"].upper-back').attr('data-content','The Rhomboids are two muscles - Rhomboid Major & Rhomboid Minor. \n' +
        'The two rhomboids lie deep to trapezius to form parallel bands that pass inferolaterally from the vertebrae to the medial border of the scapula. Rhomboid Major is thin and flat and twice as wide as the thicker Rhomboid Minor which lies superior to it. Usually there is a small space between both rhomboid muscles, however in some cases one may find one single blended muscle instead.');

    $('[data-toggle="popover"].triceps').attr('data-original-title','Triceps');
    $('[data-toggle="popover"].triceps').attr('data-content','Triceps muscle, any muscle with three heads, or points of origin, particularly the large extensor along the back of the upper arm in humans. It originates just below the socket of the scapula (shoulder blade) and at two distinct areas of the humerus, the bone of the upper arm. It extends downward and inserts on (attaches to) the upper part of the ulna, in the forearm. Its major action is extension of the forearm upon the elbow joint, in opposition to the biceps brachii.');

    $('[data-toggle="popover"].lats').attr('data-original-title','Latissimus dorsi');
    $('[data-toggle="popover"].lats').attr('data-content','The latissimus dorsi (/ləˈtɪsɪməs ˈdɔːrsaɪ/) is a large, flat muscle on the back that stretches to the sides, behind the arm, and is partly covered by the trapezius on the back near the midline. The word latissimus dorsi (plural: latissimi dorsi) comes from Latin and means "broadest [muscle] of the back", from "latissimus" (Latin: broadest)\' and "dorsum" (Latin: back). The pair of muscles are commonly known as "lats", especially among bodybuilders. The latissimus dorsi is the largest muscle in the upper body.\n' +
        '\n' +
        'The latissimus dorsi is responsible for extension, adduction, transverse extension also known as horizontal abduction, flexion from an extended position, and (medial) internal rotation of the shoulder joint. It also has a synergistic role in extension and lateral flexion of the lumbar spine.\n' +
        '\n' +
        'Due to bypassing the scapulothoracic joints and attaching directly to the spine, the actions the latissimi dorsi have on moving the arms can also influence the movement of the scapulae, such as their downward rotation during a pull up. ');

    $('[data-toggle="popover"].lower-back').attr('data-original-title','Lumbar');
    $('[data-toggle="popover"].lower-back').attr('data-content','In the lumbar region they are arranged in pairs, on either side of the vertebral column,\n' +
        '\n' +
        '    one set occupying the entire interspace between the transverse processes of the lumbar vertebrae, are the lateral lumbar intertransversarii.\n' +
        '    the other set, the medial lumbar intertransversarii, passing from the accessory process of one vertebra to the mammillary of the vertebra below.\n' +
        '\n' +
        'The intertransversarii laterales are supplied by the anterior rami, and the intertransversarii mediales by the posterior rami of the spinal nerves. ');

    $('[data-toggle="popover"].hamstrings').attr('data-original-title','Biceps femoris');
    $('[data-toggle="popover"].hamstrings').attr('data-content','The biceps femoris is one of the hamstring muscles at the back of the thigh. It originates in two places: the ischium (lower, rear portion of the pelvis, or hipbone) and the back of the femur (thighbone). The fibres of these two origins join and are attached at the head of the fibula and tibia, the bones of the lower leg. This muscle extends the thigh, rotates it outward, and flexes the leg at the knee.');

})
//data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"

function showpop(group){
    console.log(group.className);
    //console.log($(group).hasClass("selected"));

    if($(group).hasClass("selected")) {
        $("." + group.className.split(" ")).each(function (el) {
            $(this).removeAttr("style", "opacity:1");
            $(this).removeClass("selected");
            //console.log(group.className);
        });
        let newtext = $("#muscle_group").val().replace(group.className+' ','');
        $("#muscle_group").val(newtext);
    }
    else {
        let newtext = $("#muscle_group").val()+group.className+' ';
        $("#muscle_group").val(newtext);

        $("." + group.className).each(function (el) {
            $(this).attr("style", "opacity:1");
            $(this).addClass("selected");
            //console.log(group.className);
        });
    }


}