( function( api ) {

	// Extends our custom "superb-landingpage" section.
	api.sectionConstructor['superb-landingpage'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
