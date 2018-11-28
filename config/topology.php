<?php

return [
    // Whether to treat input data as Unicode data
    'unicode' => true,

    // The minimum Levenshtein Distance between old and new passwords. Setting
    // this to `0` will allow the check to pass without removing it from your
    // validations, which can be useful for development purposes.
    'min_lev_dist' => 2,

    // The data store to track topology use in - should be different from the
    // one holding your actual passwords, to reduce the usefulness of stealing
    // either store. Set to 'null' to not track this data at all (nor enforce
    // max topology use).
    'audit_store' => null,

    // The maximum number of passwords that can use a single topology (requires
    // a non-`null` `audit_store`, above). Any topology which has reached this
    // number of uses will automatically be added to the forbidden list, below.
    // Set to `0` to disable topology use limits entirely, while still
    // collecting usage data if `audit_store` is non-`null`.
    'max_topo_use' => 1,

    // The topology values below use the following components:
    //
    // u: uppercase (A-Z, or any upper/title case letters in Unicode mode)
    // l: lowercase (a-z, or any letters not in upper/title case in Unicode mode)
    // d: digit (0-9, or any Unicode number)
    // s: symbol (anything else, in either mode)
    //
    // The order they are given defines a password topology. So `udsl`
    // corresponds to inputs like "P4$s", "W0®d", and "A2#d", while the topology
    // `ldsu` corresponds to inputs like "p4$S", "w0®d", and "a2#D".
    //
    // The default list that ships with `password-topology-check` contains the
    // top 100 most commonly used topologies among dozens of enterprise
    // organizations, accounting for an enormous percentage of all passwords
    // used in those environments. The idea is that these will be the most
    // common elsewhere as well, and forbidding them entirely should help reduce
    // the attack plane of your site(s).

    // Add these topologies to the forbidden list on startup
    'forbidden' => [
        // 'dlsu',
    ],

    // Remove these topologies from the forbidden list on startup. Note that
    // `allowed` topologies are processed before `forbidden` ones, here, so
    // entries in `forbidden` have precedence.
    'allowed' => [
        // 'dlsu',
    ],
];
