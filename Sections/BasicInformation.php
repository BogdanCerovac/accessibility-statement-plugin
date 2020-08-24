<?php

class BasicInformation extends AbstractSettingsSection
{
    protected $id = 'basic_information';
    protected $title = 'Basic Information';
    protected $fields = [];

    public function __construct()
    {
        $this->fields = [
            new TextField([
                'id' => 'page_title',
                'label' => 'Page Title',
            ]),
            new TextField([
                'id' => 'organisation_name',
                'label' => 'Organisation Name',
                'description' => '(Example: “Example Inc.”)',
            ]),
            new TextField([
                'id' => 'website_name',
                'label' => 'Website Name',
                'description' => '(Example: “https://example.org”)'
            ]),
            new TextField([
                'id' => 'website_address',
                'label' => 'Website Address',
                'description' => '(Example: “Example Store” or “Example App 1.2.3”)'
            ]),
            new RadioButtons([
                'id' => 'standard_followed',
                'label' => 'Standard Followed',
                'options' => [
                    [
                        'label' => 'WCAG 2.1 level AA',
                        'value' => 'WCAG 2.1 level AA',
                    ],
                    [
                        'label' => 'WCAG 2.0 level AA',
                        'value' => 'WCAG 2.0 level AA',
                    ],
                    [
                        'label' => 'Other',
                        'value' => 'other',
                    ],
                ],
            ]),
            new TextField([
                'id' => 'other_standard',
                'label' => 'Enter Standard',
                'other' => [
                    'class' => 'hidden',
                ],
            ]),
            new RadioButtons([
                'id' => 'conformance_status',
                'label' => 'Conformance Status',
                'options' => [
                    [
                        'label' => 'Fully conformant: the content fully conforms to the accessibility standard without any exceptions ',
                        'value' => 'fully',
                    ],
                    [
                        'label' => 'Partially conformant: some parts of the content do not fully conform to the accessibility standard (you can indicate these parts in later sections of this form)',
                        'value' => 'partially',
                    ],
                    [
                        'label' => 'Non conformant: the content does not conform the accessibility standard ',
                        'value' => 'non_conformant',
                    ],
                    [
                        'label' => 'Not assessed: the content has not been evaluated or the evaluation results are not available',
                        'value' => 'not_assessed',
                    ],
                    [
                        'label' => 'None',
                        'value' => 'none',
                    ],
                ],
            ]),
            new TextArea([
                'id' => 'additional_considerations',
                'label' => 'Additional Accessibility Considerations',
                'description' => 'Additional accessibility requirements applied'
            ]),
            new TextField([
                'id' => 'contact_phone',
                'label' => 'Feedback Phone Number',
                'description' => '(Example: “+12 34 567 89 00”)'
            ]),
            new TextField([
                'id' => 'contact_email',
                'label' => 'Feedback Email Address',
                'description' => '(Example: “accessibility@example.org”)'
            ]),
            new TextField([
                'id' => 'contact_visitor_address',
                'label' => 'Feedback Visitor Address',
                'description' => '(Example: “Main Street 1, 234 Example Ville”)'
            ]),
            new TextField([
                'id' => 'contact_postal_address',
                'label' => 'Feedback Postal Address',
                'description' => '(Example: “PO Box 1, 234 Example Ville”)'
            ]),
            new TextArea([
                'id' => 'other_contact_options',
                'label' => 'Other contact options',
                'description' => '(Example: on social media; Twitter: @ExampleUser)'
            ]),
            new TextField([
                'id' => 'duration_for_response',
                'label' => 'Typical duration for response',
                'description' => '(Example: “2 business days”)'
            ]),
            new TextField([
                'id' => 'date_of_publication',
                'label' => 'Date of Publication',
                'default_value' => date('dS F Y'),
                'description' => 'Publication date of this accessibility statement'
            ]),
        ];

        parent::__construct();
    }

    public function render()
    {
        echo '<p>In this section you can provide the minimal set of information recommended for your accessibility statement. This includes information about your organization, the accessibility standards you applied, and your contact information for feedback.</p>';
    }
}
