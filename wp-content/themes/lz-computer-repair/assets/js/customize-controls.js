( function( api ) {

	// Extends our custom "lz-computer-repair" section.
	api.sectionConstructor['lz-computer-repair'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );