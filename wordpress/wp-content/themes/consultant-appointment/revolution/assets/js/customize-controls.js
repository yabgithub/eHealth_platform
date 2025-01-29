( function( api ) {

	// Extends our custom "consultant-appointment" section.
	api.sectionConstructor['consultant-appointment'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );